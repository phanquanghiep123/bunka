var App = angular.module('App', ['ui.sortable'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
App.config(['$qProvider', ($qProvider) => {
    $qProvider.errorOnUnhandledRejections(false);
}]);
App.config(['$httpProvider', ($httpProvider) => {
    $httpProvider.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded; charset=UTF-8";
    $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    $httpProvider.interceptors.push(['$q', function($q) {
        return {
            request: function(config) {
                if (config.data && typeof config.data === 'object') {
                    config.data = $.param(config.data);
                }
                return config || $q.when(config);
            }
        };
    }]);
}]);
App.filter('FormatPattern', function() {
    return function(input, $class) {
        input = input || '';
        if (input != null) {
            if ($class.width) input = input.replaceAll('{W}', "" + $class.width + "");
            else input = input.replaceAll('{W}', "N0");
            if ($class.width) input = input.replaceAll('{H}', "" + $class.height + "");
            else input = input.replaceAll('{H}', "N0");
            if ($class.quantity) input = input.replaceAll('{Q}', "" + $class.quantity + "");
            else input = input.replaceAll('{Q}', "1");
            if ($class.ItemName) input = input.replaceAll('{I}', "" + $class.ItemName + "");
            $class.FormatPattern = input;
            return input;
        }

        return input;
    };
});
App.controller('QuotationController', ($scope, $http, $compile, $filter) => {
    $scope.FOLDER1 = null;
    $scope.FOLDER2 = null;
    $scope.FOLDER1 = null;
    $scope.FOLDER2 = null;
    $scope.FOLDER1D = null;
    $scope.FOLDER2D = null;
    $scope.Onload = 0;
    $scope.catchFolder1   = null;
    $scope.catchFolder2   = null;
    $scope.KEY = 0;
    $scope.quotation = null;
    $scope.reversions = null;
    $scope.reversion = null;
    $scope.$watch("reversion",function($o,$n){
        if($scope.reversion){
            if($scope.Onload == 1){
                $http({
                    method: "POST",
                    responseType: "json",
                    data: {
                        id: $scope.reversion.id,
                    },
                    url: '/quotations/get-reversion',
                }).then((response) => {
                    if(response.data.status == 1){
                        $scope.FOLDER1 = null;
                        $scope.FOLDER2 = null;
                        setTimeout(() => {
                            $scope.FOLDER1      = response.data.data.folder;
                            $scope.catchFolder1 = angular.copy($scope.FOLDER1);
                            $scope.FOLDER2      = angular.copy($scope.catchFolder2);
                            $scope.$apply();
                        },200);
                    }
                    
                });
            }
            else{
            $scope.Onload = 1;
            }
        }
    });
    $scope.GetQuotation = ($id) => {
        $http({
            method: "POST",
            responseType: "json",
            data: {
                id: $id,
            },
            url: '/quotations/view-reversion',
        }).then((response) => {
            var data = response.data;
            if (data.status == 1) {
                $scope.FOLDER1    = data.data.folder1;
                $scope.FOLDER2    = data.data.folder2;
                $scope.catchFolder1 = angular.copy($scope.FOLDER1);
                $scope.catchFolder2 = angular.copy($scope.FOLDER2);
                $scope.reversions = data.data.reversions;
                $scope.reversion  = $scope.reversions[0];
                $("#modal-viewreversion").modal();
            }
        }, function(error) {
            scope.FOLDER2.quotation.saved = false;
            alert(_LANGS._error_ + "!!!");
        });
    }
    $scope.sortableOptions = {
        placeholder: "sortable-placeholder",
        connectWith: ".parent-root",
        items: '>tr',
         
        update: function(event,li){
            $scope.$apply();
            setTimeout(() => {
                angular.forEach($scope.FOLDER1.folders,($value,$key) => {
                    $scope.initFolder($key);    
                });
               
            },100) ;   
        }
    }
    $scope.sortableOptionsClass = {
        update: function(event, ui) {
            setTimeout(function() {
                var index = (ui.item.closest('table').attr("data-index"))
                $scope.initItemCheck(index);
            }, 100);
        },
        'ui-floating': true,
        items: '>tr',
        containment: "parent",
        connectWith: ".parent-tr-class",
        placeholder: "sortable-placeholder1",
    }
    $scope.ShowFolder = ($index, $folder) => {
        var show = angular.copy($folder.show);
        $scope.FOLDER1.folders[$index].show = !show;
        $scope.FOLDER2.folders[$index].show = !show;
    }
    $scope.ShowItem = ($index, $item, event) => {
        var show = angular.copy($item.show);
        var Pindex = (angular.element(event.target).closest('ul').attr('data-index'));
        $scope.FOLDER1.folders[Pindex].items[$index].show = !show;
        $scope.FOLDER2.folders[Pindex].items[$index].show = !show;
        return false;
    }
    $scope.GetFolder1 = (event) => {
        var $id = angular.element(event.target).val();
    }
    $scope.initFolder = ($index) => {
        var folder1  = angular.copy($scope.FOLDER1.folders[$index].items);
        var folder2  = angular.copy($scope.FOLDER2.folders[$index].items);
        var $folder1 = [];
        var $folder2 = [];
        angular.forEach(folder1,function($value,$key){
            if($value.ItemClassId != 0){
                $folder1.push($value);
            }
        })
        angular.forEach(folder2,function($value,$key){
            if($value.ItemClassId != 0){
                $folder2.push($value);
            }
        })
        var TYPE = 0;
        var FOLDER1, FOLDER2;
        if (Object.keys($folder1).length > Object.keys($folder2).length) {
            FOLDER1 = angular.copy($folder1);
            FOLDER2 = angular.copy($folder2);
            TYPE    = 1;
        } else {
            FOLDER1 = angular.copy($folder2);
            FOLDER2 = angular.copy($folder1);
            TYPE    = 2;
        }
        var TFOLDER1 = angular.copy(FOLDER1);
        var TFOLDER2 = angular.copy(FOLDER2);
        var MFOLDER  = [];
        var $c = 0;
        var AllLIST = angular.copy(TFOLDER1);
        var check = 0;
        angular.forEach(TFOLDER2,($value,$key) => {
            angular.forEach(TFOLDER1,($value1,$key1) => {
                if($value1.ItemClassId == $value.ItemClassId){
                    check++;
                }
            })
            if(check == 0){
                AllLIST.push(angular.copy($value));
            }
        });
        var LISTA = [];
        var LISTB = [];
        angular.forEach(AllLIST, function(val, key) {
            var c1 = c2 = 0;
            angular.forEach(TFOLDER1,function($value1,$key1){
                if($value1 != null){
                    if($value1.ItemClassId == val.ItemClassId){
                        LISTA.push( angular.copy($value1) );
                        TFOLDER1[$key1] = null;
                        c1 ++;
                    }
                }
            });
            angular.forEach(TFOLDER2,function($value1,$key1){
                if($value1 != null){
                    if($value1.ItemClassId == val.ItemClassId){
                        LISTB.push( angular.copy($value1) );
                        TFOLDER2[$key1] = null;
                        c2 ++;
                    }
                }  
            });
            if(c1 == 0) {
                LISTA.push({
                    ItemClassId: 0,
                    ItemId: 0,
                    height: '',
                    price: 0,
                    quantity: 0,
                    total :0,
                    inlandfreightfee : 0,
                    installfee: 0,
                    productprice:0,
                    saleprice: 0,
                    width: 0,
                    load: 1,
                    warning: 1,
                });
            }
            if(c2 == 0) {
                LISTB.push({
                    ItemClassId: 0,
                    ItemId: 0,
                    height: '',
                    price: 0,
                    quantity: 0,
                    total :0,
                    inlandfreightfee : 0,
                    installfee: 0,
                    productprice:0,
                    saleprice: 0,
                    width: 0,
                    load: 1,
                    warning: 1,
                });
            }
        });
        if (TYPE == 1) {
            $scope.FOLDER1.folders[$index].items = LISTA;
            $scope.FOLDER2.folders[$index].items = LISTB;
        } else {
            $scope.FOLDER2.folders[$index].items = LISTA;
            $scope.FOLDER1.folders[$index].items = LISTB;
        }
        var FOLDER1, FOLDER2;
        var indexOf = ["quantity", , 'price', 'inlandfreightfee', 'installfee', 'productprice', 'total'];
        if (Object.keys($scope.FOLDER1.folders[$index]).length >= Object.keys($scope.FOLDER2.folders[$index]).length) {
            FOLDER1 = angular.copy($scope.FOLDER1.folders[$index]);
            FOLDER2 = angular.copy($scope.FOLDER2.folders[$index]);
        } else {
            FOLDER1 = angular.copy($scope.FOLDER2.folders[$index]);
            FOLDER2 = angular.copy($scope.FOLDER1.folders[$index]);
        }
        angular.forEach(FOLDER1, ($value, $key) => {
            if (indexOf.indexOf($key) != -1 && typeof $value != 'object') {
                if (typeof FOLDER2[$key] != undefined) {
                    if (FOLDER2[$key] != FOLDER1[$key]) {
                        $scope.FOLDER2.folders[$index][$key + "Check"] = false;
                        $scope.FOLDER1.folders[$index][$key + "Check"] = false;
                    } else {
                        $scope.FOLDER2.folders[$index][$key + "Check"] = true;
                        $scope.FOLDER1.folders[$index][$key + "Check"] = true;
                    }
                } else {
                    $scope.FOLDER2.folders[$index][$key + "Check"] = false;
                    $scope.FOLDER1.folders[$index][$key + "Check"] = false;
                }
            }

        });
        
        setTimeout(() => {
            $scope.$apply();
            angular.forEach($scope.FOLDER1.folders,function($value,$key) {
                $scope.initItemCheck($key);
            });
        }, 100)
        return false;
    }
    $scope.initItemCheck = ($index) => {
        var folders1 = angular.copy($scope.FOLDER1.folders);
        var folders2 = angular.copy($scope.FOLDER2.folders);
        var items1 = angular.copy(folders1[$index].items);
        var items2 = angular.copy(folders2[$index].items);
        var indexOf1 = ['ItemClassName', 'FormatPattern', 'ItemName', 'price', 'total', 'installfee', 'inlandfreightfee', 'installationqsmini'];
        angular.forEach(items1, ($value, $key) => {
            var error = 0;
            angular.forEach($value, ($value1, $key1) => {
                if (typeof $value1 != 'object') {
                    if (indexOf1.indexOf($key1) > -1) {
                        try{
                            if (typeof items2[$key][$key1] != undefined) {
                                if (typeof items2[$key][$key1] == typeof items1[$key][$key1]) {
                                    if ($key1 == "FormatPattern") {
                                        var f1 = $filter('FormatPattern')(items1[$key].FormatPattern, items1[$key]);
                                        var f2 = $filter('FormatPattern')(items2[$key].FormatPattern, items2[$key]);
                                        if (f1 != f2) {
                                            items2[$key][$key1 + "Check"] = false;
                                            items1[$key][$key1 + "Check"] = false;
                                            error++;
                                        } else {
                                            items2[$key][$key1 + "Check"] = true;
                                            items1[$key][$key1 + "Check"] = true;
                                        }
                                    } else {
                                        if (items2[$key][$key1] != items1[$key][$key1]) {
                                            items2[$key][$key1 + "Check"] = false;
                                            items1[$key][$key1 + "Check"] = false;
                                            error++;
                                        } else {
                                            items2[$key][$key1 + "Check"] = true;
                                            items1[$key][$key1 + "Check"] = true;
                                        }
                                    }
                                } else {
                                    items2[$key][$key1 + "Check"] = false;
                                    items1[$key][$key1 + "Check"] = false;
                                }
                            } else {
                                items2[$key][$key1 + "Check"] = false;
                                items1[$key][$key1 + "Check"] = false;
                                error++;
                            }
                            if (items2[$key][$key1 + "Check"] == false) {
                                error++;
                            }
                            items2[$key].mergePrice = items2[$key].price - items1[$key].price;
                        }
                        catch(e){
                            
                        }
                    }
                }
            });
            if (error > 0) {items2[$key]
                items1[$key].warning = false;
                items2[$key].warning = false;
            } else {
                items1[$key].warning = true;
                items2[$key].warning = true;
            }
        });
        $scope.FOLDER1.folders[$index].items = items1
        $scope.FOLDER2.folders[$index].items = items2;
    }
    $scope.getLength = (folder) => {
        return Object.keys(folder).length;
    } 
    $scope.initFolders = () => {
        var TYPE = 0;
        var FOLDER1, FOLDER2;
        $scope.FOLDER1D = angular.copy($scope.FOLDER1);
        $scope.FOLDER2D = angular.copy($scope.FOLDER2);
        if (Object.keys($scope.FOLDER1.folders).length >= Object.keys($scope.FOLDER2.folders).length) {
            FOLDER1 = angular.copy($scope.FOLDER1.folders);
            FOLDER2 = angular.copy($scope.FOLDER2.folders);
            TYPE = 1;
        } else {
            FOLDER1 = angular.copy($scope.FOLDER2.folders);
            FOLDER2 = angular.copy($scope.FOLDER1.folders);
            TYPE = 2;
        }
        var TFOLDER1 = angular.copy(FOLDER1);
        var TFOLDER2 = angular.copy(FOLDER2);
        var MFOLDER = [];
        angular.forEach(TFOLDER1, function(val, key) {
            var $c = 0;
            $.each(TFOLDER2, function(key1, val1) {
                if (val1 != null) {
                    if (val1.ClassKey == val.ClassKey) {
                        $c++;
                        MFOLDER.push(val1);
                        TFOLDER2[key1] = null;
                        return false;
                    }
                }
            });
            if ($c == 0) {
                MFOLDER.push({
                    ClassKey: 0,
                    ClassFullName: '',
                    items: [],
                });
            }
        });
        if (TYPE == 1) {
            $scope.FOLDER2.folders = MFOLDER;
        } else {
            $scope.FOLDER1.folders = MFOLDER;
        }
        var FOLDER2 = angular.copy($scope.FOLDER2.quotation);
        var FOLDER1 = angular.copy($scope.FOLDER1.quotation);
        angular.forEach($scope.FOLDER1.quotation, ($value, $key) => {
            if (typeof $value != 'object') {
                if (typeof FOLDER2[$key] != undefined) {
                    if (typeof FOLDER2[$key] == typeof FOLDER1[$key]) {
                        if (FOLDER2[$key] != FOLDER1[$key]) {
                            FOLDER2[$key + "Check"] = false;
                            FOLDER1[$key + "Check"] = false;
                        } else {
                            FOLDER2[$key + "Check"] = true;
                            FOLDER1[$key + "Check"] = true;
                        }
                    } else {
                        FOLDER2[$key + "Check"] = false;
                        FOLDER1[$key + "Check"] = false;
                    }
                } else {
                    FOLDER2[$key + "Check"] = false;
                    FOLDER1[$key + "Check"] = false;
                }
            }
        });
        $scope.FOLDER1.quotation = FOLDER1;
        $scope.FOLDER2.quotation = FOLDER2;
    }

    $(document).on("click", "#dataTableBuilder a.view-reversion", function() {
        $scope.GetQuotation($(this).attr("data-id"));
        return false;
    });
    $('#modal-viewreversion').on('hidden.bs.modal', function(e) {
        $scope.FOLDER1 = null;
        $scope.FOLDER2 = null;
        setTimeout(function() {
            $scope.$apply();
        }, 200);
    });
    $scope.exportMerge = () => {
        $http({
            method: "POST",
            responseType: "json",
            data: {
                quotation_id : $scope.FOLDER2.quotation.id,
                folder1: JSON.stringify($scope.FOLDER1),
                folder2: JSON.stringify($scope.FOLDER2),
            },
            url: '/quotations/export-merge',
        }).then((response) => {
            var data = response.data;
            if (data.status == 1) {       
                var a = window.document.createElement('a');
                a.href = data.data;
                a.download = 'true';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            }
        }, function(error) {
           
        });
        
    }
});
App.directive('myTrInit', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.hover(function() {
                var index = element.closest('table').attr('data-index');
                var index1 = attrs.index;
                try {
                    scope.FOLDER1.folders[index].items[index1].hover = true;
                    scope.FOLDER2.folders[index].items[index1].hover = true;
                    scope.$apply();
                } catch (e) {}
            }, function() {
                var index = element.closest('table').attr('data-index');
                var index1 = attrs.index;
                try {
                    scope.FOLDER1.folders[index].items[index1].hover = false;
                    scope.FOLDER2.folders[index].items[index1].hover = false;
                    scope.$apply();
                } catch (e) {}
            });
        }
    }
});
App.directive('myTrOnload', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
        	try{
	            scope.FOLDER2.folders[scope.$parent.$index].items[scope.$index].mergePrice = scope.FOLDER2.folders[scope.$parent.$index].items[scope.$index].price - scope.FOLDER1.folders[scope.$parent.$index].items[scope.$index].price;
	            //console.log(scope.FOLDER2.folders[scope.$parent.$index]);
	            //console.log(scope.FOLDER1.folders[scope.$parent.$index]);
	            element.hover(function() {
	                var index = element.closest('table').attr('data-index');
	                var index1 = attrs.index;
	                try {
	                    scope.FOLDER1.folders[index].items[index1].hover = true;
	                    scope.FOLDER2.folders[index].items[index1].hover = true;
	                    scope.$apply();
	                } catch (e) {}
	            }, function() {
	                var index = element.closest('table').attr('data-index');
	                var index1 = attrs.index;
	                try {
	                    scope.FOLDER1.folders[index].items[index1].hover = false;
	                    scope.FOLDER2.folders[index].items[index1].hover = false;
	                    scope.$apply();
	                } catch (e) {}
	            });
	        }
	        catch(e){
	        	console.log(scope.FOLDER2.folders[scope.$parent.$index].items[scope.$index])
	        	console.log(scope.FOLDER1.folders[scope.$parent.$index].items[scope.$index])

	        }
        }
    }
});
App.directive('myChilTr', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.hover(function() {
                var index = element.closest('table').attr('data-index');
                var key = attrs.key;
                try {
                    scope.FOLDER1.folders[index][key + "Hover"] = true;
                    scope.FOLDER2.folders[index][key + "Hover"] = true;
                    scope.$apply();
                } catch (e) {}
            }, function() {
                var index = element.closest('table').attr('data-index');
                var key = attrs.key;
                try {
                    scope.FOLDER1.folders[index][key + "Hover"] = false;
                    scope.FOLDER2.folders[index][key + "Hover"] = false;
                    scope.$apply();
                } catch (e) {}
            });
        }
    }
});

App.directive('myParentTr', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.hover(function() {
                var key = attrs.key;
                try {
                    scope.FOLDER1.quotation[key + "Hover"] = true;
                    scope.FOLDER2.quotation[key + "Hover"] = true;
                    scope.$apply();
                } catch (e) {}
            }, function() {
                var key = attrs.key;
                try {
                    scope.FOLDER1.quotation[key + "Hover"] = false;
                    scope.FOLDER2.quotation[key + "Hover"] = false;
                    scope.$apply();
                } catch (e) {}
            });
        }
    }
});
 