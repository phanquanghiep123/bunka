String.prototype.replaceAll = function(find, replace) {
    var str = this;
    return str.replace(new RegExp(find.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&'), 'g'), replace);
};
Number.prototype.formatPrice = function($f = '0,0[.]00') {
    var str = this;
    return numeral(str).format($f);
};
String.prototype.formatPrice = function($f = '0,0[.]00') {
    var str = this;
    return numeral(str).format($f)
};
String.prototype.UnformatPrice = function() {
    var str = this;
    var myNumeral2 = numeral(str);
    return parseFloat(myNumeral2.value());
};
Number.prototype.UnformatPrice = function() {
    var str = this;
    var myNumeral2 = numeral(str);
    return parseFloat(myNumeral2.value());
};
var App = angular.module('App', [],
    function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
App.config(['$qProvider', ($qProvider) => {
    $qProvider.errorOnUnhandledRejections(false);
}]);
App.config(['$httpProvider', ($httpProvider) => {
    $httpProvider.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
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
            if ($class.W)
                input = input.replaceAll('{W}', " " + $class.width + " ");
            else
                input = input.replaceAll('{W}', "N0 ");
            if ($class.H)
                input = input.replaceAll('{H}', " " + $class.height + " ");
            else
                input = input.replaceAll('{H}', "N0 ");
            if ($class.quantity)
                input = input.replaceAll('{Q}', " " + $class.quantity + " ");
            else
                input = input.replaceAll('{Q}', "1 ");
            if ($class.item.ItemName)
                input = input.replaceAll('{I}', " " + $class.item.ItemName + " ");

            if ($class.WInputFlg == 1 && $class.width == null) {
                return "";
            }
            if ($class.HInputFlg == 1 && $class.height == null) {
                return "";
            }
            if ($class.QInputFlg == 1 && $class.quantity == null) {
                return "";
            }
            return input;
        }
        return input;
    };
})
App.filter('filterParent', [function($scope) {
    return function(object, index) {
        return object;
    };
}]);

App.controller('QuotationController', ($scope, $http, $compile) => {
    $scope.getTypeProduct = "Add";
    $scope.DefaultRate = null;
    $scope.CurrentIndex = 0;
    $scope.classRoot = null;
    $scope.rates = rates;
    $scope.DefaultRate = $scope.rates[0];
    $scope.customers = customers;
    $scope.taxs = taxs;
    $scope.Lstatus = Lstatus;
    $scope.product =null;
    $scope.expenses = [];
    $scope.ClassIds = [];
    $scope.product_s = null;
    $scope.OnClassServer = false;
    $scope.quotation = quotation;
    $scope.CuRate = $scope.rates[0];
    $scope.OldRate = $scope.quotation.rate;
    $scope.request = false;
    $scope.products = products;
    $scope.productSaved = 0;
    $scope.productSave = 0;
    $scope.$watch("product.quantity", function($n) {
        if ($n) {
            if ($scope.OnClassServer == false) return false;
            angular.forEach($scope.product.Classes, function(value, key) {
                try {
                    if (OnloadPrice.includes(value.PricePattern)) {
                        $scope.getPrice(value);    
                    }
                } catch (e) {}
            });
        }
    }, true);
    $scope.$watch("productSave", function($n, $o) {
    	if($scope.productSave > 0  && $n){
    		$scope.productSaved = 1;
    	}else{
    		$scope.productSaved = 0;
    	}
    });
    $scope.$watch("quotation.products", function($n, $o) {
    	if ($n != null) {
            var price = 0;
            $.each($scope.quotation.products, function() {
                if (this.total > 0) {
                    price += this.total;
                }
            });
            $scope.quotation.ProductPrice = parseFloat(price).toFixed(2);
            setTimeout(() => {
                $scope.$apply();
            }, 100);
            return true;
        }
        
    }, true);
    
    $scope.$watch("quotation.Otherproducts", function($n, $o) {
        if ($n != null) {
            var price = 0;
            $.each($scope.quotation.Otherproducts, function() {
                if (this.price > 0) {
                    price += parseFloat(this.price) - parseFloat(this.discount ? this.discount : 0);
                }
            });
            $scope.quotation.OtherproductsPrice = parseFloat(price).toFixed(2);
            return true;
        }
    }, true);
    $scope.$watch("product", function($n, $o) {
    	if ($n) {
           $scope.product.save  = 0;
           $scope.product.saved = 0;
           $scope.product.list  = [];
        }  
    });
    $scope.$watch("product", function($n, $o) {
        if ($n) {
            var totalother = 0;
            var totalsaleother = 0;
            var p = 0;
            $scope.product.OtherClasses.forEach(($val, $key) => {
                try {
                    if (parseFloat($val.saleprice) > 0)
                        totalsaleother += parseFloat($val.saleprice.UnformatPrice());
                } catch (e) {}

                try {
                    if (parseFloat($val.price) > 0)
                        totalother += parseFloat($val.price.UnformatPrice());
                } catch (e) {}
            });
            $scope.product.totalother = totalother;
            $scope.product.totalsaleother = totalsaleother;
            var price = 0;
            var saleprice = 0
            var TT = 0;
            var price = 0;
            var saleprice = 0;
            var Plustotal = [];
            var Plussaleprice = [];
            $.each($scope.product.Classes, function() {
                if (this.item != null) {
                    if (parseFloat(this.price) > 0) {
                        if (!OnloadPrice.includes(this.PricePattern)) {
                            TT += parseFloat(this.price) / parseFloat($scope.CuRate.Value1);
                            saleprice += parseFloat(this.saleprice);
                            price += parseFloat(this.price);
                        } else {
                            if (this.PricePattern == '10') {
                                $scope.product.InstallFree = this.price;
                            }
                            if (this.PricePattern == '11') {
                                $scope.product.InlandFreightFee = this.price;
                            }
                            Plustotal.push(this.price);
                            Plussaleprice.push(this.saleprice);
                        }

                    }
                }
            });
            $scope.product.TT = parseFloat(TT);
            $.each(Plussaleprice, function($key, $val) {
                saleprice += parseFloat($val);
            });
            $.each(Plustotal, function($key, $val) {
                price += parseFloat($val);
            })
            saleprice += parseFloat($scope.product.totalsaleother);
            price += parseFloat($scope.product.totalother);
            $scope.product.saleprice = (parseFloat(saleprice) * parseFloat($scope.product.quantity));
            $scope.product.price = (parseFloat(price) * parseFloat($scope.product.quantity));
            if ($scope.product.discount_active == 1) {
                var discount2 = 0;
                if ($scope.product.discount1) {
                    if ($scope.product.discount1 > 100 || $scope.product.discount1 < 0) {
                        alert("discount min:0%, max:100%");
                        $scope.product.discount1 = $o.discount1;
                    } else {
                        discount2 = (parseFloat($scope.product.price) * parseFloat($scope.product.discount1)) / 100;
                        $scope.product.discount  = discount2;
                        $scope.product.discount2 = $scope.product.discount;
                    }
                }
            }
            if ($scope.product.discount_active == 2) {
                if ($scope.product.discount2) {
                    if (parseFloat($scope.product.discount2.UnformatPrice()) > parseFloat($scope.product.price) || parseFloat($scope.product.discount2) < 0) {
                        alert("discount min :0 " + $scope.product.rate.ClassName + ", max:" + $scope.product.price + " " + $scope.product.rate.ClassName);
                        $scope.product.discount2 = $o.discount2;
                    } else {
                        var discount1 = 0;
                        discount1 = (parseFloat($scope.product.discount2) / parseFloat($scope.product.price)) * 100;
                        $scope.product.discount1 = discount1;
                        $scope.product.discount = $scope.product.discount2;
                    }
                }
            }
            $scope.product.total = $scope.product.price - parseFloat($scope.product.discount ? $scope.product.discount : 0)
        }
    }, true);
    $scope.$watch("quotation.rate", function($n, $o) {
        if ($n && $o) {
            $scope.OldRate = $o;
            $scope.CuRate = $n;
            $scope.OnClassServer = false;
            $.each($scope.quotation.products, function($key, $val) {
                $scope.product = this;
                $.each($scope.product.Classes, function() {
                    this.price = $scope.ConverPriceToRate(this.price);
                    this.saleprice = $scope.ConverPriceToRate(this.saleprice);
                });
                $.each($scope.product.OtherClasses, function() {
                    this.saleprice = $scope.ConverPriceToRate(this.saleprice);
                    this.price = $scope.ConverPriceToRate(this.price);
                });
                var discount2 = $scope.product.discount2;
                if (discount2 != undefined) {
                    $scope.product.discount2 = $scope.ConverPriceToRate(discount2);
                }
            });
            $.each($scope.quotation.Otherproducts, function() {
                this.saleprice = $scope.ConverPriceToRate(this.saleprice);
                this.price     = $scope.ConverPriceToRate(this.price);
                this.discount2 = $scope.ConverPriceToRate(this.discount2);
                this.discount  = $scope.ConverPriceToRate(this.discount);
            });
        }
    });
    $scope.$watch("quotation", function($n, $o) {
    	if($n){
    		$scope.quotation.sub_total = parseFloat($scope.quotation.ProductPrice ? $scope.quotation.ProductPrice : 0) + parseFloat($scope.quotation.OtherproductsPrice ? $scope.quotation.OtherproductsPrice : 0);
	        $scope.quotation.grand_sub_total = parseFloat($scope.quotation.sub_total) - parseFloat($scope.quotation.discount);
	        $scope.quotation.tax_price = (parseFloat($scope.quotation.grand_sub_total) / 100) * TAX;
	        try {
	            if ($n && $n != $o && $scope.quotation.discount_active == 1 && parseFloat($scope.quotation.sub_total) > 0) {
	                if ($scope.quotation.discount1 > 100 || $scope.quotation.discount1 < 0) {
	                    alert("discount min:0%, max:100%");
	                    $scope.quotation.discount1 = $o.discount1;
	                    return false;
	                }
	                var discount2 = 0;
	                discount2 = (parseFloat($scope.quotation.sub_total) * parseFloat($scope.quotation.discount1)) / 100;
	                $scope.quotation.discount  = discount2;
	                $scope.quotation.discount2 = discount2;
	                console.log(discount2);
	            }
	        } catch (e) {

	        }
	        try {
	            if ($n && $n != $o && $scope.quotation.discount_active == 2 && parseFloat($scope.quotation.sub_total) > 0) {
	                if (parseFloat($scope.quotation.discount2) > parseFloat($scope.quotation.sub_total) || parseFloat($scope.quotation.discount2) < 0) {
	                    alert("discount min :0 " + $scope.quotation.rate.ClassName + ", max:" + $scope.quotation.sub_total + " " + $scope.quotation.rate.ClassName);
	                    $scope.quotation.discount2 = $o.discount2;
	                    return false;
	                }
	                var discount1 = 0;
	                discount1 = (parseFloat($scope.quotation.discount2) / parseFloat($scope.quotation.sub_total)) * 100;
	                $scope.quotation.discount1 = discount1;
	                $scope.quotation.discount  = $scope.quotation.discount2;
	            }
	        } catch (e) {}
	        var TAX = parseFloat($scope.quotation.tax ? $scope.quotation.tax.Value1 : '0');
	        
	        $scope.quotation.total = parseFloat($scope.quotation.sub_total) - (parseFloat($scope.quotation.discount)) + parseFloat($scope.quotation.tax_price);
    	}
       
    }, true);
    $scope.$watch("product_s", function($n, $o) {
        if ($n) {
            $scope.getTypeProduct = "Add";
            $scope.quotation.products.forEach(($val, $key) => {
                if ($scope.product_s.ClassKey == $val.ClassKey) {
                    $scope.getTypeProduct = "Edit";
                    return false;
                }
            });
            return false;
        }
    });
    $scope.getPrice = ($class) => {
		if ($scope.OnClassServer == false) return false;
        if($class.IsRoot == 0 && $class.item == null) return false;
        if ($class.WInputFlg == 1 && $class.width == null && $class.IsRoot == 0) {
            return true;
        }
        if ($class.HInputFlg == 1 && $class.height == null && $class.IsRoot == 0) {
            return true;
        }
        if ($class.QInputFlg == 1 && $class.quantity == null && $class.IsRoot == 0) {
            return true;
        }
        var $parent = {
            W: 0,
            H: 0,
            Q: 1
        };
        if ($class.ParentItemClassId != 0) {
            $scope.product.Classes.forEach(($val, $key) => {
                if ($val.ItemClassId == $class.ParentItemClassId) {
                    $parent = $val;
                    return false;
                }
            });
        } else {
            $parent = $scope.classRoot;
        }
        try {
            $class.ItemId = $class.item ? $class.item.ItemId : 0
            $class.ClassKey = $scope.product.ClassKey;
            $class.Class = $scope.product.Class;
            $class.TT = $scope.product.TT ? $scope.product.TT : 0;
            if ($class.WInputFlg == 1) {
                $class.W = $class.width ? $class.width : 0;
            }
            if ($class.HInputFlg == 1) {
                $class.H = $class.height ? $class.height : 0;
            }
            if ($class.QInputFlg == 1) {
                $class.Q = $class.quantity ? $class.quantity : 0;
            }
            $class.PW = $parent ? ($parent.width ? $parent.width : 0) : 0;
            $class.PH = $parent ? ($parent.height ? $parent.height : 0) : 0;
            $class.PQ = $parent.quantity >= 1 ? $parent.quantity : 1;
            $class.RTTS = $parent.saleprice;
            $class.RATE = $scope.CuRate.Value1;
            $class.Q = $class.quantity > 0 ? $class.quantity : 1;
            $class.load = 1;
            if (NotPlus.includes($class.PricePattern)) {
                $class.Q = $scope.product.quantity;
            }
            $scope.productSave++;
            $http({
                method: "POST",
                responseType: "json",
                data: $class,
                url: '/quotations/get-price-item-poduct/',
            }).then((response) => {
                if (response.data.status == 1) {
                    $class.price = parseFloat(response.data.data.price);
                    $class.saleprice = parseFloat(response.data.data.saleprice);
                    setTimeout(() => {
                        $scope.$apply();
                        if ($class.WInputFlg == 1 && $class.width == null && $class.IsRoot == 0) {
                            return true;
                        }
                        if ($class.HInputFlg == 1 && $class.height == null && $class.IsRoot == 0) {
                            return true;
                        }
                        if ($class.QInputFlg == 1 && $class.quantity == null && $class.IsRoot == 0) {
                            return true;
                        }
                        $scope.product.Classes.forEach(($val, $key) => {
                            if ($val.item) {
                                if ($val.ParentItemClassId == $class.ItemClassId) {
                                    if (!NotPlus.includes($val.PricePattern))
                                        $scope.getPrice($val);
                                }

                            }
                        });
                    }, 100);

                } else {
                    alert(response.data["message"]);
                }
                $class.load = 0;
                $scope.productSave--;
            }, function(error) {
                $class.load = 0;
                $scope.productSave--;
            });
        } catch (e) {
            $scope.productSave--;
        }
	}
    $scope.MapWatch = (index) => {
        if (index != 0) {
            $scope.product.Classes[index].IsRoot = 0;
            $scope.ClassIds.push($scope.product.Classes[index].ItemClassId);
        } else {
            $scope.product.Classes[index].IsRoot = 1;
            $scope.ClassIds = [];
            $scope.classRoot = $scope.product.Classes[index];
        }
        try {
            if (OnloadPrice.includes($scope.product.Classes[index].PricePattern)) {
            	$scope.getPrice($scope.product.Classes[index]);
            }
        } catch (e) {
        }
    }
    $scope.ApplyCustomer = (event) => {
        $http({
            method: "GET",
            responseType: "json",
            url: '/quotations/customer/' + $scope.quotation.customer_id,
        }).then(function(response) {
            if (response.data.status == 1) {
                $scope.quotation.customer = response.data.data;
            }
        }, function(error) {

        });
    }
    $scope.ChargeLablePrice = ($id) => {
        $http({
            method: "GET",
            responseType: "json",
            url: '/quotations/rate/' + $scope.quotation.lang_id,
        }).then(function(response) {
            if (response.data.status == 1) {
                $scope.rate = response.data.data;
                $scope.quotation.rate = $scope.rate.Value1;
            }
        }, function(error) {

        });
    }
    $scope.GetItemsProduct = () => {
        var ClassKey = $scope.product_s.ClassKey
        $scope.product = null; 
        $scope.quotation.products.forEach(($val, $key) => {
            if ($scope.product_s.ClassKey == $val.ClassKey) {
                $scope.getTypeProduct = "Edit";
                $scope.OnClassServer = false;
                $scope.product = $val;
		        setTimeout(() => {
		            $scope.OnClassServer = true;
		        }, 1500)
                return false;
            }
        });
        if ($scope.product != null) {
            return false;
        }
        $scope.productSave++;
        $http({
            method: "GET",
            responseType: "json",
            url: '/quotations/get-items-product/' + ClassKey,
        }).then(function(response) {
            if (response.data.status == 1) {
                $scope.product = response.data.data;
                $scope.product.rate = $scope.quotation.rate;
            }
            $scope.productSave--;
        }, function(error) {
        	$scope.productSave--;
        });
    }
    $scope.Loading = ($e) => {
        $scope.removeLoading($e);
        var loadingString = `<div class="loading-full"><div ng-if="itemClass.load == 1" class="loader"></div></div>`;
        $e.append(loadingString);
    }
    $scope.removeLoading = ($e) => {
        $e.find(".loading-full").remove();
    }
    $scope.addOtherItem = () => {
        var p = {
            ItemClassName: "Other",
            name: '',
            quantity: 1,
            saleprice: 0,
            price: 0
        }
        $scope.product.OtherClasses.push(p);
        return false;
    }
    $scope.AddProduct = () => {
        $scope.product = null;
        $scope.OnClassServer = true;
        $("#modal-add").modal();
        return false;
    }
    $scope.changeProduct = (index) => {
        $scope.OnClassServer = false;
        $scope.product = null;
        setTimeout(() => {
        	$scope.$apply();
        },100);
        setTimeout(() => {
            $scope.OnClassServer = true;
            $scope.CurrentIndex = index;
        }, 1500)
        $("#modal-add").modal();
        $scope.product = $scope.quotation.products[index];
        setTimeout(() => {
        	$scope.$apply();
        },100);
    }
    $scope.RemoveOtherClasses = ($index) => {
        var warning = 'Are you sure you want to do this?';
        if (confirm(warning)){
        	if ($index != null) {
        		$scope.product.OtherClasses.splice($index, 1);
            }
        }
        return false;
    }
    $scope.AddOtherProduct = () => {
        var other = {
            name: "",
            saleprice: "",
            price: "",
            discount1: "",
            discount2: "",
            discount: "",
            quantity: ""
        };
        $scope.quotation.Otherproducts.push(other);
    }
    $scope.RemoveOtherProduct = ($index) => {
        var warning = 'Are you sure you want to do this?';
        if (confirm(warning)){
        	if ($index != null) {
        		$scope.quotation.Otherproducts.splice($index, 1);
            }
        }
        return false;
    }
    $scope.ConverPriceToRate = ($price) => {
        var C1 = parseFloat($scope.OldRate.Value1);
        var C2 = parseFloat($scope.CuRate.Value1);
        var C3 = parseFloat($scope.DefaultRate.Value1);
        $price = ($price.UnformatPrice()/C3 / C1) * C2;
        return $price;
    }
    $scope.deleteProduct = (index = null) => {
        var warning = 'Are you sure you want to do this?';
        if (confirm(warning)) {
        	if($scope.quotation.products[index].id > 0){
        		if (index == null) {
	                $scope.quotation.products.forEach(($val, $key) => {
	                    if ($scope.product.ClassKey == $val.ClassKey) {
	                        index = $key;
	                    }
	                });
	            }
	            if (index != null) {
	               $scope.quotation.products.splice(index, 1); 
	            }
        	}
            $scope.product = null;
            $scope.product_s = null;
            setTimeout(() => {
                $scope.$apply();
            }, 100);
        }
        return false;
    }
    $scope.addlistProduct = () =>{
    	if($scope.product){
    		var list = 
    		angular.forEach($scope.product.Classes,($value,$key) => {
    			if(){}
    		});
    	}
    }
});
App.directive('floatthead', function() {
    return {
        restrict: 'A',
        replace: false,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs) {
            element.floatThead({
                scrollContainer: function($table) {
                    return $table.closest('.wrapper');
                }
            });
        }
    };
});
App.directive('productform', function() {
    return {
        restrict: 'A',
        replace: false,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs) {
            element.bind("submit", function($event) {
                $event.stopPropagation();
                $event.preventDefault();
                this.validate = element.validateform({
                    beforeadderror: function($v1, $v2, $v3) {
                        if ($v1 == false) {
                            $($v3).addClass("error");
                        } else {
                            $($v3).removeClass("error");
                        }
                        return false;
                    }
                });
                $.each(element.find(".error"), function() {
                    $(this).removeClass("error");
                });
                if (this.validate.checkInvalid()) {
                    if (scope.product.OnSave == 1) {
                        scope.quotation.products[scope.CurrentIndex] = scope.product;
                    } else {
                        scope.product.OnSave = 1;
                        scope.quotation.products.push(scope.product);
                    }
                    $("#modal-add").modal("hide");
                    setTimeout(() => {
                        scope.product_s = null;
                        scope.product = null;
                        scope.$apply();
                    }, 500)
                    scope.OnClassServer = false;
                }
                return false;
            });
        }
    };
});

App.directive('quotationform', ['$http', function($http) {
    return {
        restrict: 'A',
        replace: false,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs) {
            element.bind("submit", function($event) {
                $event.stopPropagation();
                $event.preventDefault();
                this.validate = element.validateform({
                    beforeadderror: function($v1, $v2, $v3) {
                        if ($v1 == false) {
                            $($v3).addClass("error");
                        } else {
                            $($v3).removeClass("error");
                        }
                        return false;
                    }
                });
                $.each(element.find(".error"), function() {
                    $(this).removeClass("error");
                });
                var count = scope.quotation.products.length;
                if (this.validate.checkInvalid()) {
                	scope.quotation.saved = 1;
                    var quotation = {
                        id: scope.quotation.id ? scope.quotation.id : 0,
                        quotation_number: scope.quotation.quotation_number,
                        project: scope.quotation.project,
                        date_start: scope.quotation.date_start,
                        customer_id: scope.quotation.customer.id,
                        discount_active: scope.quotation.discount_active,
                        rate: scope.CuRate.Value1,
                        rate_id: scope.CuRate.ClassKey,
                        status_id: scope.quotation.status.id,
                        tax_id: scope.quotation.tax ? scope.quotation.tax.ClassKey : 0,
                        tax: scope.quotation.tax ? scope.quotation.tax.Value1 : 0,
                        sub_total: scope.quotation.sub_total,
                        grand_sub_total: scope.quotation.grand_sub_total,
                        total: scope.quotation.total,
                        tax_price: scope.quotation.tax_price,
                        discount1: scope.quotation.discount1,
                        discount2: scope.quotation.discount2,
                        discount: scope.quotation.discount,
                    }
                    $http({
                        method: "POST",
                        responseType: "json",
                        data: quotation,
                        url: '/quotations/store/',
                    }).then((response) => {
                        if (response.data.status == 1) {
                            scope.quotation.id = response.data.data.id;
                            var products = [];
                            var others = [];
                            var other, product;
                            angular.forEach(scope.quotation.products, function($value, $key) {
                                product = {
                                    id: $value.id ? $value.id : 0,
                                    code: $value.code,
                                    quotation_id: scope.quotation.id,
                                    product_id: $value.ClassKey,
                                    discount1: $value.discount1,
                                    discount2: $value.discount2,
                                    discount: $value.discount,
                                    discount_active: $value.discount_active,
                                    quantity: $value.quantity,
                                    totalsale: $value.totalsale,
                                    total: $value.price,
                                    rate_id: scope.CuRate.Value1,
                                    rate: scope.CuRate.Value1,
                                    inlandfreightfee: $value.InlandFreightFee,
                                    installfree: $value.InstallFree,
                                    pricenotinstall: $value.pricenotinstall,
                                    classes: [],
                                    others: []
                                };
                                angular.forEach($value.Classes, function($value, $key) {
                                    if ($value.item != null) {
                                        product.classes.push({
                                            id: $value.id ? $value.id : 0,
                                            itemclassid: $value.ItemClassId,
                                            H: $value.H ? $value.H : 0,
                                            W: $value.W ? $value.W : 0,
                                            Q: $value.Q ? $value.Q : 1,
                                            width: $value.H ? $value.H : 0,
                                            height: $value.W ? $value.W : 0,
                                            quantity: $value.Q ? $value.Q : 1,
                                            TT: $value.TT ? $value.TT : 0,
                                            PW: $value.PW ? $value.PW : 0,
                                            PH: $value.PH ? $value.PH : 0,
                                            PQ: $value.PQ ? $value.PQ : 1,
                                            saleprice: $value.saleprice ? $value.saleprice : 0,
                                            price: $value.price ? $value.price : 0,
                                            PricePattern: $value.PricePattern,
                                            item_id: $value.item ? $value.item.ItemId : 0
                                        });
                                    }
                                })
                                angular.forEach($value.OtherClasses, function($value, $key) {
                                    product.others.push({
                                        id: $value.id ? $value.id : 0,
                                        name: $value.name,
                                        quantity: $value.quantity,
                                        saleprice: $value.saleprice,
                                        discount_active: $value.discount_active,
                                        price: $value.price,
                                    });
                                });
                                products.push(product);
                            });
                            angular.forEach(scope.quotation.Otherproducts, function($value, $key) {
                                other = {
                                    id: $value.id ? $value.id : 0,
                                    quotation_id: scope.quotation.id,
                                    name: $value.name,
                                    discount1: $value.discount1,
                                    discount2: $value.discount2,
                                    discount: $value.discount,
                                    quantity: $value.quantity,
                                    saleprice: $value.saleprice,
                                    price: $value.price,
                                    rate_id: scope.CuRate.Value1,
                                    rate: scope.CuRate.Value1,
                                };
                                others.push(other);
                            });
                            $http({
                                method: "POST",
                                responseType: "json",
                                data: {
                                    products: products,
                                    others: others,
                                    rate_id: scope.CuRate.Value1,
                                    rate: scope.CuRate.Value1,
                                    quotation_id: scope.quotation.id
                                },
                                url: '/quotations/add-detail/',
                            }).then((response) => {
                                if (response.data.status == 1) {
                                    var data = response.data.data;
                                    var productsR = data.productsR;
                                    var othersR = data.othersR;
                                    if (Object.keys(productsR).length > 0) {
                                        angular.forEach(productsR, function($value, $key) {
                                            scope.quotation.products[$key].id = $value.id;
                                            if ($value.classes.length > 0) {
                                                angular.forEach($value.classes, function($value1, $key1) {
                                                    scope.quotation.products[$key].Classes[$key1].id = $value1;
                                                });
                                            }
                                            if ($value.others.length > 0) {
                                                angular.forEach($value.others, function($value2, $key2) {
                                                    scope.quotation.products[$key].OtherClasses[$key2].id = $value2;
                                                });
                                            }
                                        });
                                    }
                                    if (othersR.length > 0) {
                                        angular.forEach(othersR, function($value, $key) {
                                            scope.quotation.Otherproducts[$key].id = $value;
                                        });
                                    }
                                    scope.quotation.saved = 0;
                                }

                            }, function(error) {
                            	scope.quotation.saved = 0;
                            	alert("Error!");
                            });

                        }
                    }, function(error) {
                        scope.quotation.saved = 0;
                        alert("Error!");
                    });
                }
                return false;
            });
        }
    };
    $('#modal-add').on('hidden.bs.modal', function (e) {
	    if($scope.product.saved == 1) {
	    	alert("Data are saved");
	    	return false;
		    var setInval = setInterval(function(){
			   	if($scope.product.saved == 0){
			   		$('#modal-add').modal("hide")
			   		clearInterval(setInval);
			   	}
		    },1);
		   
	    } 
	    $scope.product = null;  
	})
}]);

App.directive('blurinput', ['$http', function($http) {
    return {
        restrict: 'A',
        replace: false,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs) {
            var OLD;
            element.bind("blur", function() {
                if (scope.product) {
                    if (OLD != element.val()) {
                        scope.getPrice(scope.itemClass);
                    }
                    if (scope.itemClass.IsRoot == 1) {
                        if (scope.classRoot.WInputFlg == 1 && scope.classRoot.W == null) {
                            return false;
                        }
                        if (scope.classRoot.HInputFlg == 1 && scope.classRoot.H == null) {
                            return false;
                        }
                        $.each(scope.product.Classes, function($key, $value) {
                            if ($key != 0) this.disabled = true;
                        });
                        $http({
                            method: "POST",
                            responseType: "json",
                            data: {
                                ItemId: scope.classRoot.item.ItemId,
                                ItemClassIds: scope.ClassIds,
                                Class: scope.product.Class,
                                ClassKey: scope.product.ClassKey,
                                Width: scope.classRoot.W,
                                Height: scope.classRoot.H,
                            },
                            url: '/quotations/reload-items/',
                        }).then((response) => {
                                if (response.data.status == 1) {
                                    $.each(response.data.data, function($key, $value) {
                                        scope.product.Classes[($key + 1)].items = $value["items"];
                                        scope.product.Classes[($key + 1)].item = $value["item"];
                                        scope.product.Classes[($key + 1)].disabled = false;
                                    });
                                }
                            },
                            (error) => {

                            }
                        );
                    }
                }
            });
            element.bind("focus", function() {
                OLD = element.val();
            });
        }
    }
}]);

App.directive('selectchange', ['$http', function($http) {
    return {
        restrict: 'A',
        replace: false,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs) {
            element.bind("change", function() {
                if (scope.product) {
                    scope.itemClass.ItemId = element.val();
                    scope.getPrice(scope.itemClass);
                    if (scope.itemClass.IsRoot == 1) {
                        if (scope.classRoot.WInputFlg == 1 && scope.classRoot.width == null) {
                            return false;
                        }
                        if (scope.classRoot.HInputFlg == 1 && scope.classRoot.height == null) {
                            return false;
                        }
                        $.each(scope.product.Classes, function($key, $value) {
                            if ($key != 0) this.disabled = true;
                        });
                        $http({
                            method: "POST",
                            responseType: "json",
                            data: {
                                ItemId: scope.classRoot.item.ItemId,
                                ItemClassIds: scope.ClassIds,
                                Class: scope.product.Class,
                                ClassKey: scope.product.ClassKey,
                                Width: scope.classRoot.W,
                                Height: scope.classRoot.H,
                            },
                            url: '/quotations/reload-items/',
                        }).then((response) => {
                                if (response.data.status == 1) {
                                    $.each(response.data.data, function($key, $value) {
                                        scope.product.Classes[($key + 1)].items = $value["items"];
                                        scope.product.Classes[($key + 1)].item = $value["item"];
                                        scope.product.Classes[($key + 1)].disabled = false;
                                    });
                                }
                            },
                            (error) => {

                            }
                        );
                    }

                }
            });
        }
    }
}]);

App.directive('productdiscount', ['$http', function($http) {
    return {
        restrict: 'A',
        replace: false,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs) {
            element.bind("focus", () => {
                scope.product.discount_active = parseFloat(attrs.active);       
            });
        }
    }
}]);
App.directive('quotationdiscount', ['$http', function($http) {
    return {
        restrict: 'A',
        replace: false,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs) {
            element.bind("focus", () => {
                scope.quotation.discount_active = parseFloat(attrs.active);
            });
        }
    }
}]);
App.directive('otherproductdiscount', ['$http', function($http) {
    return {
        restrict: 'A',
        replace: false,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs) {
            element.bind("focus", () => {
                scope.Otherproduct.discount_active = parseFloat(attrs.active);
            });
            scope.$watch("Otherproduct", function($n, $o) {
                if (scope.Otherproduct.price == null) return false;
                try {
                    if ($n && $n != $o && scope.Otherproduct.discount_active == 1 && parseFloat(scope.Otherproduct.price.UnformatPrice()) > 0) {
                        if (scope.Otherproduct.discount1 > 100 || scope.Otherproduct.discount1 < 0) {
                            alert("discount min:0%, max:100%");
                            scope.Otherproduct.discount1 = $o.discount1;
                            return false;
                        }
                        var discount2 = 0;
                        discount2 = (parseFloat(scope.Otherproduct.price) * parseFloat(scope.Otherproduct.discount1)) / 100;
                        scope.Otherproduct.discount = discount2;
                        scope.Otherproduct.discount2 = discount2;

                    }
                } catch (e) {
                    console.log(e);
                }
                try {
                    if ($n && $n != $o && scope.Otherproduct.discount_active == 2 && parseFloat(scope.Otherproduct.price.UnformatPrice()) > 0) {
                        if (parseFloat(scope.Otherproduct.discount2) > parseFloat(scope.Otherproduct.price) || parseFloat(scope.Otherproduct.discount2) < 0) {
                            alert("discount min :0 " + scope.Otherproduct.rate.ClassName + ", max:" + scope.Otherproduct.price + " " + scope.Otherproduct.rate.ClassName);
                            scope.Otherproduct.discount2 = $o.discount2;
                            return false;
                        }
                        var discount1 = 0;
                        discount1 = (parseFloat(scope.Otherproduct.discount2) / parseFloat(scope.Otherproduct.price)) * 100;
                        discount1 = discount1;
                        scope.Otherproduct.discount1 = discount1;
                        scope.Otherproduct.discount = scope.Otherproduct.discount2;
                    }
                } catch (e) {
                    console.log(e);
                }
            }, true);
        }
    }
}]);

App.directive('classitem', function() {
    return {
        restrict: 'A',
        replace: false,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs) {
            scope.$watch("itemClass.price", function($n, $o) {
                if (scope.product) {
                    setTimeout(() => {
                        scope.product.Classes.forEach(($val, $key) => {
                            if (NotPlus.includes($val.PricePattern) && $val.ItemClassId != scope.itemClass.ItemClassId) {
                                scope.getPrice($val);
                            }
                        });
                    }, 500);
                }
            });
        }
    };
});
App.directive('stringToNumber', function() {
    return {
        require: 'ngModel',
        link: function(scope, element, attrs, ngModel) {
            ngModel.$parsers.push(function(value) {
                return '' + value;
            });
            ngModel.$formatters.push(function(value) {
                return parseFloat(value);
            });
        }
    };
});

App.directive('number', function() {
    return {
        require: 'ngModel',
        restrict: 'A',
        link: function(scope, element, attrs, ctrl) {
            ctrl.$parsers.push(function(input) {
                if (!angular.isUndefined(input)) {
                    if (input == undefined) return '';
                    var inputNumber = input.toString().replace(/[^0-9 .]/g, '');
                    if (inputNumber != input) {
                        ctrl.$setViewValue(inputNumber);
                        ctrl.$render();
                    }
                    return inputNumber;
                }
            });
        }
    };
});
App.directive('inputformatprice', function() {
    return {
        require: 'ngModel',
        restrict: 'A',
        link: function(scope, element, attrs, ctrl) {
            ctrl.$parsers.push(function(input) {
                if (!angular.isUndefined(input)) {
                    var inputNumber = input.toString().replace(/[^0-9]/g, '');
                    ctrl.$setViewValue(inputNumber.formatPrice());
                    ctrl.$render();
                    return inputNumber;
                }
            });
            element.bind("focus", function($n, $o) {
                element.removeClass("error");
            });
            scope.$watch(function() {
                if (ctrl.$modelValue) {
                    element.val(ctrl.$modelValue.formatPrice());
                }
            });
        }
    };
});

App.directive('inputformatnumber', function() {
    return {
        require: 'ngModel',
        restrict: 'A',
        link: function(scope, element, attrs, ctrl) {
            ctrl.$parsers.push(function(input) {
                if (!angular.isUndefined(input)) {
                    var inputNumber = input.toString().replace(/[^0-9]/g, '');
                    ctrl.$setViewValue(inputNumber.formatPrice('0,0'));
                    ctrl.$render();
                    return inputNumber;
                }
            });
            scope.$watch("CuRate", function($n, $o) {
                if ($n)
                    if (ctrl.$viewValue)
                        ctrl.$setViewValue(ctrl.$viewValue.formatPrice('0,0'));
            });
        }
    };
});
App.directive('day', function() {
    return {
        // A = attribute, E = Element, C = Class and M = HTML Comment
        restrict: 'A',
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs, ctrl) {
            element.datetimepicker({
                timepicker: false,
                format: 'd/m/Y',
                formatDate: 'd/m/Y',
            });
        }
    }
});