var App = angular.module('App', [], function($interpolateProvider) {
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
App.controller('OrdersController', ($scope, $http, $compile) => {
    angular.element(document).ready(function() {
        angular.element('.content-main').css("display", "block");
    });
    $scope.order = order;
    $scope.langs = langs;
    $scope.quotations = [];
    $scope.quotation = [];
    $scope.status = null;
    $scope.CuRate = rate;
    $scope.product = {};
    $scope.message = '';
    $scope.dialogOpenAlert = false;
    $scope.alert_type = 'success';
    $scope.Appquotation = () => {
        $http({
            url: '/orders/get-quotation/' + $scope.quotation.id,
            method: "GET",
            responseType: "json",
        }).then(
            (response) => {
                var data = response.data;
                if (data.status == 1) {
                    $scope.order.quotation = data.data;
                    setTimeout(() => {
                        $scope.$apply()
                    }, 100)
                }
            }, (error) => {});
    }
    $scope.getOrderNo = () => {
        if ($scope.order.id == 0) {
            var Noname = $scope.order.person_in_charge.numberOrder ? ($scope.order.person_in_charge.numberOrder + 1) : '1';
            var Y = new Date().getFullYear() + "";
            Y = Y.substr(Y.length - 1);
            Noname = Y + $scope.order.person_in_charge.id + '-' + Noname;
            if ($scope.order.quotation && $scope.order.quotation.short_name) {
                Noname = "B" + $scope.order.quotation.short_name + "-" + Noname;
            }
            return Noname;
        } else {
            return $scope.order.order_number;
        }
    }
    $scope.SaveOrder = ($type) => {
        var formData = angular.element("#order-form");
        var validate = formData.validateform({
            beforeadderror: function($v1, $v2, $v3) {
                if ($v1 == false) {
                    $($v3).addClass("error");
                } else {
                    $($v3).removeClass("error");
                }
                return false;
            },
        });
        $.each(formData.find(".error"), function() {
            $(this).removeClass("error");
        });
        if (validate.checkInvalid()) {

            order.saved = true;
            $scope.dialogOpenAlert = true;
            $scope.message = _LANGS['[_saved_please_wait_]'];
            $scope.alert_type = 'success';
            var dataSubmit = {
                order_number: $scope.getOrderNo(),
                person_in_charge: order.person_in_charge,
                receiving_order_date: order.receiving_order_date,
                planned_delivery_date: order.planned_delivery_date,
                planned_installation_date: order.planned_installation_date,
                planned_completion_date: order.planned_completion_date,
                quotation_id: order.quotation.id,
                construction_id: order.construction.id,
                status_id: $type,
            }
            setTimeout(() => {
                $http({
                    url: '/orders/store/' + $scope.order.id,
                    method: "POST",
                    responseType: "json",
                    data: dataSubmit
                }).then(
                    (response) => {
                        var data = response.data;
                        $scope.dialogOpenAlert = false;
                        if (data.status != 1) {
                            setTimeout(()=>{
                                $scope.dialogOpenAlert = true;
                                $scope.message = data.message;
                                $scope.alert_type = 'error';
                                $scope.$apply();
                            },1000);
                        } else {
                            setTimeout(()=>{
                                $scope.dialogOpenAlert = true;
                                $scope.message = _LANGS['[_save_success_reload_]'];
                                $scope.alert_type = 'success';
                                $scope.$apply();
                                if (data._redirect == 1) {
                                    setTimeout(function() {
                                        document.location.href = data._redirect_url;
                                    },2000);
                                }
                            },1000);
                            
                        }
                        order.saved = false;
                    }, (error) => {
                        order.saved = false;
                    });
            },1000)
            
           
        }else{
            $scope.dialogOpenAlert = true;
            $scope.message = _LANGS['[_please_enter_all_info_]'];
            $scope.alert_type = 'error';
        }
    }
    $scope.GetTotalProduct = ($product) => {
        return $scope.GetSubTotalProduct($product);
    }
    $scope.GetTotalSaleProduct = ($product) => {
        var list = $product.list;
        var TT = 0;
        angular.forEach(list, ($value) => {
            if ($value.saleprice > 0) {
                TT += $value.saleprice;
            }
        });
        return TT;
    }
    $scope.GetTotalDiscountProduct = ($product) => {
        var list = $product.list;
        var TT = 0;
        angular.forEach(list, ($value) => {
            if ($value.discount > 0) {
                TT += $value.discount;
            }
        });
        return TT;
    }
    $scope.countProduct = ($index) =>{
        return (Object.keys($scope.order.quotation.products).length + $index);
    }
    $scope.GetSubTotalProduct = ($product) => {
        var list = $product.list;
        var TT = 0;
        angular.forEach(list, ($value) => {
            if ($value.price > 0) {
                TT += $value.price;
            }
        });
        return TT;
    }
    $scope.GetSubTotalQuotation = () => {
        var TT = 0
        angular.forEach($scope.order.products, ($value, $key) => {
            TT += $scope.GetTotalProduct($value) - $scope.GetTotalDiscountProduct($value);
        });
        angular.forEach($scope.order.quotation.Otherproducts, ($value, $key) => {
            if ($value.saved == true) TT += ($value.price ? $value.price : 0) - ($value.discount ? $value.discount : 0);
        });
        return TT;
    }
    $scope.GetDiscountQuotation = () => {
        var DC = ($scope.order.quotation.discount ? $scope.quotation.discount : 0);
        return DC;
    }
    $scope.GetGrandSubTotalQuotation = () => {
        var DC = $scope.GetSubTotalQuotation() - $scope.GetDiscountQuotation();
        return DC;
    }
    $scope.GetTaxQuotation = () => {
        var TAX = parseFloat($scope.order.quotation.tax ? $scope.quotation.tax.value : '0');
        var DC = $scope.GetGrandSubTotalQuotation() * TAX / 100;
        return DC;
    }
    $scope.GetTotalQuotation = () => {
        return $scope.GetGrandSubTotalQuotation() + $scope.GetTaxQuotation();
    }
    $scope.ViewProduct = ($product) => {
        $scope.product = $product;
        $("#modal-view-product").modal();
        return false ;
    }
});
App.directive('select2quotation', ['$http', function($http) {
    return {
        // A = attribute, E = Element, C = Class and M = HTML Comment
        restrict: 'A',
        template: ` <select ng-model="order.quotation" ng-options='option as option.quotation_number for option in quotations track by option.id' class="form-control" id="area_id" validate="true" data-validate="required">
            <option value="">--` + _LANGS._choose_ + ` ` + _LANGS._quotation_ + `--</option>
        </select>
        `,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs, ctrl) {
            $http({
                url: '/orders/get-quotations/' + scope.order.id,
                method: "GET",
                responseType: "json",
            }).then(
                (response) => {
                    var data = response.data;
                    if (data.status == 1) {
                        scope.quotations = data.data;
                        setTimeout(() => {
                            element.find('select').select2({
                                placeholder: _LANGS._select_ + " " + _LANGS._quotation_,
                                maximumSelectionSize: 6,
                            });
                            if (scope.order.quotation) {
                                element.find('select').select2("val", scope.order.quotation.id);
                            } else {
                                element.find('select').select2("val", "");
                            }
                        }, 200);
                    }
                }, (errors) => {});
        }
    }
}]);
App.directive('select2user', ['$http', function($http) {
    return {
        // A = attribute, E = Element, C = Class and M = HTML Comment
        restrict: 'A',
        template: ` <select ng-disabled="order.id > 0" ng-model="order.person_in_charge" ng-options='option as ( option.code + ": " + option.first_name + " " + option.last_name + " ("+option.numberOrder+")" ) for option in users track by option.id' class="form-control" id="users_id" validate="true" data-validate="required"></select>
        `,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs, ctrl) {

            $http({
                url: '/orders/get-users/',
                method: "GET",
                responseType: "json",
            }).then(
                (response) => {
                    var data = response.data;
                    if (data.status == 1) {
                        scope.users = data.data;
                        setTimeout(() => {
                            element.find('select').select2({
                                placeholder: _LANGS._select_ + " " + _LANGS._person_in_charge_,
                                maximumSelectionSize: 6,
                            });
                            if (scope.order.person_in_charge) {
                                element.find('select').select2("val", scope.order.person_in_charge.id);
                            } else {
                                element.find('select').select2("val", "");
                            }
                        }, 200);
                    }
                }, (errors) => {});
        }
    }
}]);
App.directive('select2status', ['$http', function($http) {
    return {
        // A = attribute, E = Element, C = Class and M = HTML Comment
        restrict: 'A',
        template: ` <select ng-model="order.status" ng-options='option as option.name for option in status track by option.id' class="form-control" id="status" validate="true" data-validate="required">
            <option value="">--` + _LANGS._choose_ + ` ` + _LANGS._status_ + `--</option>
        </select>`,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs, ctrl) {
            $http({
                url: '/orders/get-status/',
                method: "GET",
                responseType: "json",
            }).then(
                (response) => {
                    var data = response.data;
                    if (data.status == 1) {
                        scope.status = data.data;
                        setTimeout(() => {
                            element.find('select').select2({
                                placeholder: _LANGS._select_ + " " + _LANGS._status_,
                                maximumSelectionSize: 6,
                            });
                            if (scope.order.status) {
                                element.find('select').select2("val", scope.order.status.id);
                            } else {
                                element.find('select').select2("val", "");
                            }
                        }, 200);
                    }
                }, (errors) => {});
        }
    }
}]);
App.directive('day', ['$filter', function($filter) {
    return {
        // A = attribute, E = Element, C = Class and M = HTML Comment
        restrict: 'A',
        require: 'ngModel',
        scope: {
            min: '=?'
        },
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs, ctrl) {
            element.datetimepicker({
                timepicker: false,
                format: 'd/m/Y',
                formatDate: 'd/m/Y',
                minDate : scope.min

            });
            element.attr('readonly', 'true');
            element.css({"background-color": "#ffffff"});
            scope.$watch(function() {
                return ctrl.$modelValue;
            }, function() {
                if (ctrl.$modelValue) {
                    element.val($filter('date')(ctrl.$modelValue, 'dd/M/yyyy'));
                }
            });
            if (attrs.datamin == 'true') {
                scope.$watch(function() {
                    return scope.min;
                }, function($n, $o) {
                    if (!scope.min) {
                        element.attr('disabled', 'disabled');
                    } else {
                        if(element.val()){
                            var V = element.datetimepicker('getValue');
                            var TV = new Date(V);
                            var from = scope.min.split("/")
                            var f = new Date(from[2], from[1], from[0]);
                            var AV = new Date(f);
                            if (TV < AV) {
                                element.val(scope.min);
                            }
                        }
                        element.removeAttr('disabled');
                    }
                    element.datetimepicker('setOptions', {
                        minDate: scope.min
                    });
                });
            }
        }
    }
}]);
App.directive('select2construction', ['$http', function($http) {
    return {
        // A = attribute, E = Element, C = Class and M = HTML Comment
        restrict: 'A',
        template: ` <select ng-model="order.construction" ng-options='option as option.name for option in constructions track by option.id' class="form-control" id="construction_id" validate="true" data-validate="required">
            <option value="">--` + _LANGS._choose_ + ` ` + _LANGS._construction_ + `--</option>
        </select>`,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs, ctrl) {
            $http({
                url: '/orders/get-constructions',
                method: "GET",
                responseType: "json",
            }).then(
                (response) => {
                    var data = response.data;
                    if (data.status == 1) {
                        scope.constructions = data.data;
                        setTimeout(() => {
                            element.find('select').select2({
                                placeholder: _LANGS._select_ + " " + _LANGS._construction_,
                                maximumSelectionSize: 6,
                            });
                            if (scope.order.construction) {
                                element.find('select').select2("val", scope.order.construction.id);
                            } else {
                                element.find('select').select2("val", "");
                            }
                        }, 200)
                    }
                }, (errors) => {})
        }
    }
}]);