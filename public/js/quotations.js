angular.element(document).ready(function() {
    angular.element('.content-main').css("display", "block");
});
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
App.filter('FormatPattern', function() {
    return function(input, $class) {
        input = input || '';
        if (input != null) {
            if ($class.W) input = input.replaceAll('{W}', " " + $class.width + " ");
            else input = input.replaceAll('{W}', "N0 ");
            if ($class.H) input = input.replaceAll('{H}', " " + $class.height + " ");
            else input = input.replaceAll('{H}', "N0 ");
            if ($class.quantity) input = input.replaceAll('{Q}', " " + $class.quantity + " ");
            else input = input.replaceAll('{Q}', "1 ");
            if ($class.item.ItemName) input = input.replaceAll('{I}', " " + $class.item.ItemName + " ");
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
App.filter('convertRate', function() {
    return function(input, rate, old) {
        if (rate.Value1 == 1) {
            input = parseFloat(input) * parseFloat(old.Value1);
        } else {
            input = parseFloat(input) * parseFloat(old.Value1) / parseFloat(rate.Value1);
        }
        return input;
    };
});
App.controller('QuotationController', ($scope, $http, $compile, $filter) => {
    $scope.getTypeProduct = _LANGS._add_;
    $scope.langs = langs;
    $scope.OnloadPrice = OnloadPrice;
    $scope.DefaultRate = null;
    $scope.CurrentIndex = 0;
    $scope.classRoot = null;
    $scope.rates = rates;
    $scope.LoadPrice = true;
    $scope.is_view = is_view;
    $scope.CList = null;
    $scope.customers = null;
    $scope.taxs = taxs;
    $scope.product = null;
    $scope.expenses = [];
    $scope.ClassIds = [];
    $scope.product_s = null;
    $scope.OnClassServer = false;
    $scope.quotation = quotation;
    $scope.OldRate = $scope.quotation.rate;
    $scope.request = false;
    $scope.products = products;
    $scope.productSaved = 0;
    $scope.productSave = 0;
    $scope.ButtonStatusAddList = _LANGS._add_to_list_;
    $scope.old_rate_value = 1;
    $scope.currentList = null;
    $scope.CurrentListIndex = null;
    $scope.message = '';
    $scope.dialogOpenAlert = false;
    $scope.alert_type = 'success';
    angular.element('#modal-add').on('hide.bs.modal', function(e) {
        $scope.currentList = null;
        $scope.resetProduct(false);
        $scope.product = null;
        $scope.product_s = null;
        setTimeout(() => {
            $scope.$apply();
        }, 100);
    });

    $scope.countProduct = ($index) => {
        return (Object.keys($scope.quotation.products).length + $index);
    }
    $scope.$watch("product.quantity", function($n) {
        if ($n) {
            angular.forEach($scope.product.Classes, function(value, key) {
                try {
                    if (OnloadPrice.includes(value.PricePattern)) {
                        $scope.getPrice(value);
                    }
                } catch (e) {}
            });
        }
    }, true);
    $scope.$watch("dialogOpenAlert", function($n,$o) {
        if($n == true){
            setTimeout(() => {
                $scope.dialogOpenAlert=false;
            },10000);
        }
    });
    $scope.$watch("productSave", function($n, $o) {
        if ($scope.productSave > 0 && $n) {
            $scope.productSaved = 1;
        } else {
            $scope.productSaved = 0;
        }
    });
    $scope.$watch("productSaved", function($n, $o) {
        if ($scope.productSaved == 1) {
            angular.forEach(angular.element('body #modal-add [ng-click]'), ($value, $key) => {
                var a = angular.element($value);
                a.attr("disabled", "disabled");
            });
        } else {
            angular.forEach(angular.element('body #modal-add [ng-click]'), ($value, $key) => {
                var a = angular.element($value);
                a.removeAttr("disabled");
            })
        }
    });
    $scope.$watch("currentList", ($n, $o) => {
        if ($o) {
            angular.forEach($o.Classes, ($value, $key) => {
                $value.saved = true;
            });
        }
    })
    $scope.$watch("CurrentListIndex", function($n, $o) {
        if ($scope.CurrentListIndex != null) {
            $scope.ButtonStatusAddList = _LANGS._save_change_;
        } else {
            $scope.ButtonStatusAddList = _LANGS._add_to_list_;
        }
    });
    $scope.$watch("quotation.products", function($n, $o) {
        if ($n != null) {
            var price = 0;
            angular.forEach($scope.quotation.products, function($value, $key) {
                if (this.total > 0) {
                    price += $scope.GetTotalProduct($value);
                }
            });
            $scope.quotation.ProductPrice = parseFloat(price);
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
                if (this.saved == true && this.price > 0) {
                    price += parseFloat(this.price) - parseFloat(this.discount ? this.discount : 0);
                }
            });
            $scope.quotation.OtherproductsPrice = parseFloat(price);
            return true;
        }
    }, true);
    $scope.$watch("product", function($n, $o) {
        if ($n) {
            if (typeof $scope.product.list != 'object') $scope.product.list = [];
        }
    });
    $scope.$watch("product", function($n, $o) {
        if ($n) {
            var price = 0;
            var saleprice = 0
            var TT = 0;
            var price = 0;
            var saleprice = 0;
            var Plustotal = [];
            var Plussaleprice = [];
            var productprice = 0;
            $.each($scope.product.Classes, function() {
                if (parseFloat(this.price) > 0) {
                    if (!OnloadPrice.includes(this.PricePattern)) {
                        if (this.type == 0) {
                            TT += parseFloat(this.price);
                        }
                        saleprice += parseFloat(this.saleprice);
                        price += parseFloat(this.price);
                        productprice += this.price;
                    } else {
                        if (this.type == 0) {
                            if (this.PricePattern == '10') {
                                $scope.product.installfee = this.price;
                                $scope.product.installfee_sale = this.saleprice;
                            }
                            if (this.PricePattern == '11') {
                                $scope.product.inlandfreightfee = this.price;
                                $scope.product.inlandfreightfee_sale = this.saleprice;
                            }
                            Plustotal.push(this.price);
                            Plussaleprice.push(this.saleprice);
                        }
                    }
                }
            });
            $scope.product.TT = parseFloat(TT);
            $scope.product.productprice = parseFloat(TT) * parseFloat($scope.product.quantity);
            saleprice = (parseFloat(saleprice) * parseFloat($scope.product.quantity));
            $.each(Plussaleprice, function($key, $val) {
                saleprice += parseFloat($val);
            });
            price = (parseFloat(price) * parseFloat($scope.product.quantity));
            $.each(Plustotal, function($key, $val) {
                price += parseFloat($val);
            });
            $scope.product.saleprice = saleprice;
            $scope.product.price = price;
            if (!$scope.product.price && $scope.product.price < 1) {
                $scope.product.discount = 0;
                $scope.product.discount2 = 0;
                if ($scope.product.discount1 > 100 || $scope.product.discount1 < 0) {
                    alert("discount min:0%, max:100%");
                    $scope.product.discount1 = $o.discount1;
                }
            } else {
                if ($scope.product.discount_active == 1) {
                    var discount2 = 0;
                    if ($scope.product.discount1) {
                        if ($scope.product.discount1 > 100 || $scope.product.discount1 < 0) {
                            alert("discount min:0%, max:100%");
                            $scope.product.discount1 = $o.discount1;
                        } else {
                            discount2 = (parseFloat($scope.product.price) * parseFloat($scope.product.discount1)) / 100;
                            $scope.product.discount = discount2;
                            $scope.product.discount2 = $scope.product.discount;
                        }
                    }
                }
                if ($scope.product.discount_active == 2) {
                    if ($scope.product.discount2) {
                        if (parseFloat($scope.product.discount2) > parseFloat($scope.product.price) || parseFloat($scope.product.discount2) < 0) {
                            alert("discount min :0 " + $scope.quotation.rate.ClassName + ", max:" + $scope.product.price + " " + $scope.quotation.rate.ClassName);
                            $scope.product.discount2 = $o.discount2.formatPrice();
                        } else {
                            var discount1 = 0;
                            discount1 = (parseFloat($scope.product.discount2) / parseFloat($scope.product.price)) * 100;
                            $scope.product.discount1 = discount1;
                            $scope.product.discount = $scope.product.discount2;
                        }
                    }
                }
            }
            $scope.product.total = $scope.product.price - parseFloat($scope.product.discount ? $scope.product.discount : 0)
        }
    }, true);
    $scope.convertRate = (input) => {
        if ($scope.quotation.rate.Value1 == 1) {
            input = parseFloat(input) * parseFloat($scope.OldRate.Value1);
        } else {
            input = parseFloat(input) * parseFloat($scope.OldRate.Value1) / parseFloat($scope.quotation.rate.Value1);
        }
        return input;
    };
    $scope.addanCloselistProduct = () => {
        if($scope.addlistProduct()){
            setTimeout(() => {
                $("#modal-add").modal("hide");
            },1000)  ;
        }
    }
    $scope.convertRateOnloadEdit = () => {
        $scope.OnClassServer = false;
        angular.forEach($scope.quotation.products, ($value, $key) => {
            angular.forEach($value.list, ($value1, $key1) => {
                angular.forEach($value1.Classes, ($value2, $key2) => {
                    $value2.price = parseFloat($value2.price)/parseFloat($scope.quotation.rate.Value1);
                    $value2.saleprice = parseFloat($value2.saleprice)/parseFloat($scope.quotation.rate.Value1);
                })
                angular.forEach($value1.OtherClasses, ($value2, $key2) => {
                    $value2.saleprice = parseFloat($value2.saleprice)/parseFloat($scope.quotation.rate.Value1);
                    $value2.price = parseFloat($value2.price)/parseFloat($scope.quotation.rate.Value1);
                });
                if ($value1.discount != undefined) {
                    $value1.discount = parseFloat($value1.discount)/parseFloat($scope.quotation.rate.Value1);
                }
                if ($value1.discount2 != undefined) {
                    $value1.discount2 = parseFloat($value1.discount2)/parseFloat($scope.quotation.rate.Value1);
                }
                if ($value1.TT != undefined) {
                    $value1.TT = parseFloat($value1.TT.discount2)/parseFloat($scope.quotation.rate.Value1);
                }
                if ($value1.inlandfreightfee != undefined) {
                    $value1.inlandfreightfee = parseFloat($value1.inlandfreightfee)/parseFloat($scope.quotation.rate.Value1);
                }
                if ($value1.installfee != undefined) {
                    $value1.installfee = parseFloat($value1.installfee)/parseFloat($scope.quotation.rate.Value1);
                }
                if ($value1.price != undefined) {
                    $value1.price = parseFloat($value1.price)/parseFloat($scope.quotation.rate.Value1);
                }
                if ($value1.productprice != undefined) {
                    $value1.productprice = parseFloat($value1.productprice)/parseFloat($scope.quotation.rate.Value1);
                }
                if ($value1.saleprice != undefined) {
                    $value1.saleprice = parseFloat($value1.saleprice)/parseFloat($scope.quotation.rate.Value1);
                }
                if ($value1.total != undefined) {
                    $value1.total = parseFloat($value1.total)/parseFloat($scope.quotation.rate.Value1);
                }
            });
        })
        angular.forEach($scope.quotation.Otherproducts, ($value, $key) => {
            $value.saleprice = parseFloat($value.saleprice)/parseFloat($scope.quotation.rate.Value1);
            $value.price = parseFloat($value.price)/parseFloat($scope.quotation.rate.Value1);
            $value.discount2 = parseFloat($value.discount2)/parseFloat($scope.quotation.rate.Value1);
            $value.discount = parseFloat($value.discount)/parseFloat($scope.quotation.rate.Value1);
        })
        setTimeout(() => {
            $scope.$apply()
            $scope.OnClassServer = true;
        }, 500);
    }
    if($scope.quotation.id > 0){
        $scope.convertRateOnloadEdit();
    }
    $scope.$watch("quotation.rate", function($n, $o) {
        if ($n && $o) {
            $scope.OldRate = $o;
            $scope.OnClassServer = false;
            angular.forEach($scope.quotation.products, ($value, $key) => {
                angular.forEach($value.list, ($value1, $key1) => {
                    angular.forEach($value1.Classes, ($value2, $key2) => {
                        $value2.price = $scope.convertRate($value2.price);
                        $value2.saleprice = $scope.convertRate($value2.saleprice);
                    })
                    angular.forEach($value1.OtherClasses, ($value2, $key2) => {
                        $value2.saleprice = $scope.convertRate($value2.saleprice);
                        $value2.price = $scope.convertRate($value2.price);
                    });
                    console.log($value1);
                    if ($value1.discount != undefined) {
                        $value1.discount = $scope.convertRate($value1.discount);
                    }
                    if ($value1.discount2 != undefined) {
                        $value1.discount2 = $scope.convertRate($value1.discount2);
                    }
                    if ($value1.TT != undefined) {
                        $value1.TT = $scope.convertRate($value1.TT.discount2);
                    }
                    if ($value1.inlandfreightfee != undefined) {
                        $value1.inlandfreightfee = $scope.convertRate($value1.inlandfreightfee);
                    }
                    if ($value1.installfee != undefined) {
                        $value1.installfee = $scope.convertRate($value1.installfee);
                    }
                    if ($value1.price != undefined) {
                        $value1.price = $scope.convertRate($value1.price);
                    }
                    if ($value1.productprice != undefined) {
                        $value1.productprice = $scope.convertRate($value1.productprice);
                    }
                    if ($value1.saleprice != undefined) {
                        $value1.saleprice = $scope.convertRate($value1.saleprice);
                    }
                    if ($value1.total != undefined) {
                        $value1.total = $scope.convertRate($value1.total);
                    }
                });
            })
            angular.forEach($scope.quotation.Otherproducts, ($value, $key) => {
                $value.saleprice = $scope.convertRate($value.saleprice);
                $value.price = $scope.convertRate($value.price);
                $value.discount2 = $scope.convertRate($value.discount2);
                $value.discount = $scope.convertRate($value.discount);
            })
            setTimeout(() => {
                $scope.$apply()
                $scope.OnClassServer = true;
            }, 500);
        }
    },true);
    $scope.HasDiscount = () => {
        var i = 0;
        angular.forEach($scope.quotation.products, ($value, $key) => {
            angular.forEach($value.list, ($value2, $key) => {
                if ($value2.discount > 0) i++;
            });
        })
        if (i > 0) return false;
        else return true;
    }
    $scope.checkInstall = (PricePattern) => {
        return $scope.OnloadPrice.includes(PricePattern.toString());
    }
    $scope.$watch("quotation", function($n, $o) {
        var SubTT = $scope.GetSubTotalQuotation();
        if (!SubTT && SubTT < 1) {
            $scope.quotation.discount = 0;
            $scope.quotation.discount2 = 0;
            if ($scope.quotation.discount1 > 100 || $scope.quotation.discount1 < 0) {
                alert("discount min:0%, max:100%");
                $scope.quotation.discount1 = $o.discount1;
                return false;
            }
        } else {
            if ($n) {
                try {
                    if ($n && $n != $o && $scope.quotation.discount_active == 1 && SubTT > 0) {
                        if ($scope.quotation.discount1 > 100 || $scope.quotation.discount1 < 0) {
                            alert("discount min:0%, max:100%");
                            $scope.quotation.discount1 = $o.discount1;
                            return false;
                        }
                        var discount2 = 0;
                        discount2 = (SubTT * parseFloat($scope.quotation.discount1)) / 100;
                        $scope.quotation.discount = discount2;
                        $scope.quotation.discount2 = discount2;
                    }
                } catch (e) {}
                try {
                    if ($n && $n != $o && $scope.quotation.discount_active == 2 && SubTT > 0) {
                        if (parseFloat($scope.quotation.discount2) > SubTT || parseFloat($scope.quotation.discount2) < 0) {
                            alert("discount min :0 " + $scope.quotation.rate.ClassName + ", max:" + SubTT + " " + $scope.quotation.rate.ClassName);
                            $scope.quotation.discount2 = $o.discount2.formatPrice();
                            return false;
                        }
                        var discount1 = 0;
                        discount1 = parseFloat($scope.quotation.discount2) / SubTT * 100;
                        $scope.quotation.discount1 = discount1;
                        $scope.quotation.discount = $scope.quotation.discount2;
                    }
                } catch (e) {}
            }
        }
    }, true);
    $scope.$watch('quotation.rate', function() {
        setTimeout(() => {
            $scope.$apply();
        }, 500)
    });
    $scope.$watch("product_s", function($n, $o) {
        if ($n) {
            return false;
        }
    });
    $scope.ProductAddEdit = () => {
        $scope.getTypeProduct = _LANGS._add_;
        if ($scope.product_s == null) return $scope.getTypeProduct;
        $scope.quotation.products.forEach(($val, $key) => {
            if ($scope.product_s.ClassKey == $val.ClassKey) {
                $scope.getTypeProduct = _LANGS._edit_;
            }
        });
        return $scope.getTypeProduct;
    }
    $scope.getQuotationNo = () => {
        if ($scope.quotation.id == 0) {
            var No = $scope.quotation.quotation_no;
            var Noname = No;// ? No.id + "" : '0';
            for (var i = 1; i < 3; i++) {
                if (Noname.length < 3) {
                    Noname = '0' + Noname;
                }
            }
            var Y = new Date().getFullYear() + "";
            Y = Y.substr(Y.length - 1);
            Noname = Y + $scope.quotation.user_id + "-" + Noname;
            if ($scope.quotation.branch) {
                Noname = "B" + $scope.quotation.branch.short_name + "-" + Noname;
            }
            return Noname + "";
        } else {
            return $scope.quotation.quotation_number;
        }
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
    $scope.GetTotalProduct = ($product) => {
        return $scope.GetSubTotalProduct($product);
    }
    $scope.GetSubTotalQuotation = () => {
        var TT = 0
        angular.forEach($scope.quotation.products, ($value, $key) => {
            TT += $scope.GetTotalProduct($value) - $scope.GetTotalDiscountProduct($value);
        });
        angular.forEach($scope.quotation.Otherproducts, ($value, $key) => {
            if ($value.saved == true) TT += ($value.price ? $value.price : 0) - ($value.discount ? $value.discount : 0);
        });
        return TT;
    }
    $scope.GetDiscountQuotation = () => {
        var DC = ($scope.quotation.discount ? $scope.quotation.discount : 0);
        return DC;
    }
    $scope.GetGrandSubTotalQuotation = () => {
        var DC = $scope.GetSubTotalQuotation() - $scope.GetDiscountQuotation();
        return DC;
    }
    $scope.GetTaxQuotation = () => {
        var TAX = parseFloat($scope.quotation.tax ? $scope.quotation.tax.value : '0');
        var DC = $scope.GetGrandSubTotalQuotation() * TAX / 100;
        return DC;
    }
    $scope.GetTotalQuotation = () => {
        return $scope.GetGrandSubTotalQuotation() + $scope.GetTaxQuotation();
    }
    $scope.getPrice = ($class) => {
        if ($scope.is_view == true) return false;
        if ($scope.OnClassServer == false) return false;
        if ($scope.product == null) return false;
        if ($class.saved == true) return false;
        if ($class.IsRoot == 0 && $class.item == null) return false;
        if (parseFloat($class.WInputFlg) == 1 && !(parseFloat($class.width) >= 0)) {
            return false;
        }
        if (parseFloat($class.HInputFlg) == 1 && !(parseFloat($class.height) >= 0)) {
            return false;
        }
        if (parseFloat($class.QInputFlg) == 1 && !(parseFloat($class.quantity) >= 0)) {
            return false;
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
            $class.TT = $class.TT;
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
            $class.RTTS = parseFloat($parent.saleprice);
            $class.RATE = $scope.quotation.rate.Value1;
            $class.Q = $class.quantity > 0 ? $class.quantity : 1;
            $class.load = 1;
            if (OnloadPrice.includes($class.PricePattern)) {
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
                	// added: nhannt
                    $class.saleprice = parseFloat(response.data.data.saleprice);
                    if ($class.PricePattern == '11') {
                		if (!isNaN(response.data.data.keisu_inlandfreightfee.value))  {
                			$class.price = parseFloat(response.data.data.price)*parseFloat(response.data.data.keisu_inlandfreightfee.value);
                		} else {
                			$class.price = parseFloat(response.data.data.price);
                		}
                	} else {
                		$class.price = parseFloat(response.data.data.price);
                	}
                	if ($class.PricePattern == '10') {
                		if (!isNaN(response.data.data.keisu_installfee.value))  {
                			$class.price = parseFloat(response.data.data.price)*parseFloat(response.data.data.keisu_installfee.value);
                		} else {
                			$class.price = parseFloat(response.data.data.price);
                		}
                	} else {
                		$class.price = parseFloat(response.data.data.price);
                	}
                    setTimeout(() => {
                        $scope.$apply();
                        if ($scope.product) {
                            try {
                                $scope.product.Classes.forEach(($val, $key) => {
                                    if ($val.item) {
                                        if ($val.ParentItemClassId == $class.ItemClassId) {
                                            if (!NotPlus.includes($val.PricePattern)) {
                                                $scope.getPrice($val);
                                            }
                                        }
                                    }
                                });
                            } catch (e) {}
                        }
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
        try {
            if (index != 0) {
                $scope.product.Classes[index].IsRoot = 0;
            } else {
                $scope.product.Classes[index].IsRoot = 1;
                $scope.classRoot = $scope.product.Classes[index];
            }
            if (OnloadPrice.includes($scope.product.Classes[index].PricePattern)) {
                $scope.getPrice($scope.product.Classes[index]);
            }
        } catch (e) {}
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
        }, function(error) {});
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
        }, function(error) {});
    }
    $scope.GetItemsProduct = () => {
        var ClassKey = $scope.product_s.ClassKey;
        if ($scope.product != null)
            if (ClassKey == $scope.product.ClassKey) return false;
        $scope.product = null;
        $scope.quotation.products.forEach(($val, $key) => {
            if ($scope.product_s.ClassKey == $val.ClassKey) {
                $val.code = null;
                $val.quantity = 1;
                $val.discount = 0;
                $val.discount1 = 0;
                $val.discount2 = 0;
                $val.price = 0;
                $val.saleprice = 0;
                $val.TT = 0;
                $val.saved = false;
                $val.Classes.forEach(($value, $key, $object) => {
                    if ($value.type == 1) {
                        $val.Classes.splice($key, (Object.keys($val.Classes).length - 1));
                        return false;
                    } else {
                        if (!OnloadPrice.includes($value.PricePattern)) {
                            $value.item = null;
                            $value.saved = false;
                            $value.width = null;
                            $value.height = null;
                            $value.quantity = null;
                            $value.price = 0;
                            $value.saleprice = 0;
                        } else {
                            $scope.getPrice($value);
                        }
                    }
                });
                $scope.product = $val;
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
                $scope.product.saved = false;
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
            name: '',
            quantity: '',
            remarks: '',
            saleprice: 0,
            price: '',
            type: 1,
            WInputFlg: 1,
            HInputFlg: 1,
            QInputFlg: 1
        }
        $scope.product.Classes.push(p);
        setTimeout(function() {
            $(".product-classs-wrapper #table-1").animate({
                scrollTop: $(".product-classs-wrapper #table-1")[0].scrollHeight
            }, 500);
        }, 500)
        return false;
    }
    $scope.AddProduct = () => {
        $scope.product = null;
        $scope.OnClassServer = true;
        $("#modal-add").modal({
            backdrop: false
        });
        return false;
    }
    $scope.resetProduct = ($T = true) => {
        if ($scope.product == null) return false;
        $scope.product.code = "";
        $scope.product.quantity = 1;
        $scope.product.discount = 0;
        $scope.product.discount1 = 0;
        $scope.product.discount2 = 0;
        $scope.product.price = 0;
        $scope.product.saleprice = 0;
        $scope.product.TT = 0;
        $scope.product.Classes.forEach(($value, $key, $object) => {
            if ($value.type == 1) {
                $scope.product.Classes.splice($key, (Object.keys($scope.product.Classes).length - 1));
                return false;
            } else {
                if (!OnloadPrice.includes($value.PricePattern)) {
                    $value.item = null;
                    $value.saved = $T;
                    $value.width = null;
                    $value.height = null;
                    $value.quantity = null;
                    $value.price = 0;
                    $value.saleprice = 0;
                } else {
                    $scope.getPrice($value);
                }
            }
        });
        angular.forEach($scope.product.list, ($value, $key) => {
            $value.on_edit = false;
        })
        return false;
    }
    $scope.CancelEditItem = ($item) => {
        $item.on_edit = false;
        $scope.currentList = null;
        $scope.CurrentListIndex = null;
        $scope.resetProduct();
        return false;
    }
    $scope.editItemList = ($item, index) => {
        angular.forEach(angular.element('body #modal-add [ng-click]'), ($value, $key) => {
            var a = angular.element($value);
            a.attr("disabled", "disabled");
        });
        $scope.currentList = null;
        angular.forEach($scope.product.list, ($value, $key) => {
            $value.on_edit = false;
        })
        $item.on_edit = true;
        $scope.product.quantity = 1;
        setTimeout(() => {
            $scope.CurrentListIndex = index;
            $scope.currentList = $item;
            $scope.product.Classes.forEach(($value, $key, $object) => {
                if ($value.type == 1) {
                    $scope.product.Classes.splice($key, (Object.keys($scope.product.Classes).length - 1));
                    return false;
                }
            });
            $scope.product = angular.merge($scope.product, $item);
            setTimeout(() => {
                $scope.$apply();
            }, 100);
            setTimeout(() => {
                $scope.product.saved = false;
                $scope.product.Classes.forEach(($value, $key, $object) => {
                    $value.saved = false;
                });
                $scope.$apply();
                angular.forEach(angular.element('body #modal-add [ng-click]'), ($value, $key) => {
                    var a = angular.element($value);
                    a.removeAttr("disabled");
                });
            }, 500);
        }, 200)
    }
    $scope.changeProduct = ($product) => {
        $scope.product = $product;
        $scope.product_s = $product;
        setTimeout(() => {
            $scope.$apply();
        }, 100);
        $("#modal-add").modal({
            backdrop: false
        });
    }
    $scope.RemoveOtherClasses = ($index) => {
        var warning = _LANGS._warning_delete_;
        if (confirm(warning)) {
            if ($index != null) {
                $scope.product.Classes.splice($index, 1);
            }
        }
        return false;
    }
    $scope.AddOtherProduct = ($event, $Otherproduct) => {
        $Otherproduct.saved = true;
        var other = {
            name: "",
            saleprice: "",
            price: "",
            discount1: "",
            discount2: "",
            discount: "",
            quantity: "",
            type: 1,
            saved: false
        };
        $scope.quotation.Otherproducts.push(other);
    }
    $scope.RemoveOtherProduct = ($index) => {
        var warning = _LANGS._warning_delete_;
        if (confirm(warning)) {
            if ($index != null) {
                $scope.quotation.Otherproducts.splice($index, 1);
            }
        }
        return false;
    }

    $scope.deleteProductItem = (index = null) => {
        var warning = _LANGS._warning_delete_;
        if (confirm(warning)) {
            $scope.product.list.splice(index, 1);
            setTimeout(() => {
                $scope.$apply();
            }, 100);
        }
        return false;
    }
    $scope.copyProductItem = (index = null) => {
        var warning = _LANGS['[_warning_clone_]'];
        if (confirm(warning)) {
            var clone = angular.copy($scope.product.list[index]);
            clone.on_edit = false;
            clone.id = 0;
            angular.forEach(clone.Classes, (value, key) => {
                try {
                    if (value.type == 0) {
                        value.item.id = 0;
                    } else {
                        value.id = 0;
                    }
                } catch (e) {}
            });
            $scope.product.list.push(clone);
            setTimeout(() => {
                $scope.$apply();
            }, 100);
        }
        return false;
    }
    $scope.deleteProduct = (index = null) => {
        var warning = _LANGS._warning_delete_;
        if (confirm(warning)) {
            $scope.quotation.products.splice(index, 1);
            setTimeout(() => {
                $scope.$apply();
            }, 100);
        }
        return false;
    }
    $scope.checkExitsProduct = () => {
        var checkProduct = 0;
        angular.forEach($scope.quotation.products, ($value, $key) => {
            if ($value.ClassKey == $scope.product.ClassKey) {
                checkProduct++;
            }
        });
        if (checkProduct == 0) {
            return false
        } else {
            return true;
        }
    }
    $scope.deleteCurrentProduct = () => {
        var warning = _LANGS._warning_delete_;
        if (confirm(warning)) {
            angular.forEach($scope.quotation.products, ($value, $key) => {
                if ($value.ClassKey == $scope.product.ClassKey) {
                    $scope.quotation.products.splice($key, 1);
                    $scope.product = null;
                    $scope.product_s = null;
                    setTimeout(() => {
                        $scope.$apply();
                    }, 100);
                    return false;
                }
            });
        }
        return false;
    }
    $scope.addlistProduct = () => {
        var validate = $("#product-form").validateform({
            beforeadderror: function($v1, $v2, $v3) {
                if ($v1 == false) {
                    $($v3).addClass("error");
                } else {
                    $($v3).removeClass("error");
                }
                return false;
            }
        });
        $.each($("#product-form").find(".error"), function() {
            $(this).removeClass("error");
        });
        if (validate.checkInvalid()) {
            var $Classes = angular.merge({}, $scope.product);
            var checkProduct = 0;
            delete $Classes.list;
            $Classes.saved = true;
            $Classes.on_edit = false;
            angular.forEach($Classes.Classes, ($value, $key) => {
                $value.saved = true;
            });
            try {
                if ($scope.CurrentListIndex != null) {
                    $scope.product.list[$scope.CurrentListIndex] = $Classes;
                } else {
                    $scope.product.list.push($Classes);
                }
            } catch (e) {}
            angular.forEach($scope.quotation.products, ($value, $key) => {
                if ($value.ClassKey == $scope.product.ClassKey) {
                    checkProduct++;
                }
            });
            if (checkProduct == 0) {
                $scope.quotation.products.push($scope.product);
            }
            $scope.currentList = null;
            $scope.CurrentListIndex = null;
            $scope.resetProduct();
            setTimeout(() => {
                $scope.$apply();
            }, 100);
            return true;
        }
        return false;
    }
    $scope.submitlistProduct = () => {
        if (Object.keys($scope.product.list).length > 0) {
            $scope.resetProduct();
            if ($scope.product.saved != true) {
                $scope.product.saved = true;
                $scope.quotation.products.push($scope.product);
            }
        }
        $("#modal-add").modal("hide");
        $scope.product_s = null;
        $scope.product = null;
        setTimeout(() => {
            $scope.$apply();
        }, 100)
    }
    $scope.ReloadItem = ($data) => {
        $scope.ClassIds = [];
        $.each($scope.product.Classes, function() {
            if (this.IsRoot == 0 && this.type == 0) $scope.ClassIds.push(this.ItemClassId);
        })
        $data.ItemClassIds = $scope.ClassIds;
        $http({
            method: "POST",
            responseType: "json",
            data: $data,
            url: '/quotations/reload-items/',
        }).then((response) => {
            if (response.data.status == 1) {
                $.each(response.data.data, function($key, $value) {
                    $scope.product.Classes[($key + 1)].items = $value["items"];
                    $scope.product.Classes[($key + 1)].item = $value["item"];
                    $scope.product.Classes[($key + 1)].disabled = false;
                });
            }
        }, (error) => {});
    }
    $scope.SubmitFrom = ($status_id) => {
        $scope.quotation.status_id = $status_id;
        angular.element(".quotation-form").submit();
    }
    $scope.setRate = () => {
        if (!$scope.quotation.rate) return $scope.quotation.rate = $scope.rates[0];
    }
});
App.directive('floatthead', function() {
    return {
        restrict: 'A',
        replace: false,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs) {
            setTimeout(() => {
                element.floatThead({
                    scrollContainer: function($table) {
                        return $table.closest('.wrapper');
                    }
                });
            }, 1000);
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
                    scope.quotation.saved = true;
                    scope.dialogOpenAlert = true;
                    scope.message = _LANGS['[_saved_please_wait_]'];
                    scope.alert_type = 'success';
                    var quotation = {
                        id: scope.quotation.id ? scope.quotation.id : 0,
                        quotation_number: scope.getQuotationNo(),
                        project: scope.quotation.project,
                        date_start: scope.quotation.date_start,
                        customer_id: scope.quotation.customer ? scope.quotation.customer.id : 0,
                        area_id: scope.quotation.area ? scope.quotation.area.id : 0,
                        construction_id: scope.quotation.construction ? scope.quotation.construction.id : 0,
                        branch_id: scope.quotation.branch ? scope.quotation.branch.id : 0,
                        discount_active: scope.quotation.discount_active,
                        rate: scope.quotation.rate.Value1,
                        rate_id: scope.quotation.rate.ClassKey,
                        status_id: scope.quotation.status_id,
                        tax_id: scope.quotation.tax ? scope.quotation.tax.id : 0,
                        tax_value: scope.quotation.tax ? scope.quotation.tax.value : 0,
                        sub_total: scope.quotation.sub_total,
                        grand_sub_total: scope.quotation.grand_sub_total,
                        total: scope.quotation.total,
                        tax_price: scope.quotation.tax_price,
                        discount1: scope.quotation.discount1,
                        discount2: scope.quotation.discount2,
                        discount: scope.quotation.discount,
                        quotation_no_id: scope.quotation.quotation_no ? scope.quotation.quotation_no.id : 0,
                        rates : scope.rates,
                        construction_address : scope.quotation.construction_address,
                        winrate : scope.quotation.winrate
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
                                angular.forEach($value.list, ($value2, $key2) => {
                                    product = {
                                        id: $value2.id ? $value2.id : 0,
                                        code: $value2.code,
                                        quotation_id: scope.quotation.id,
                                        product_id: $value2.ClassKey,
                                        discount1: $value2.discount1,
                                        discount2: $value2.discount2,
                                        discount: $value2.discount,
                                        discount_active: $value2.discount_active,
                                        quantity: $value2.quantity,
                                        rate_id: scope.quotation.rate.ClassKey,
                                        rate: scope.quotation.rate.Value1,
                                        classes: []
                                    };
                                    angular.forEach($value2.Classes, function($value1, $key1) {
                                        if ($value1.type == 0) {
                                            if ($value1.item != null) {
                                                if (OnloadPrice.includes($value1.PricePattern)) {
                                                    $value1.Q = product.quantity;
                                                }
                                                product.classes.push({
                                                    DispOrder: $value1.DispOrder,
                                                    id: ($value1.item && $value1.item.id) ? $value1.item.id : 0,
                                                    ItemClassId: $value1.ItemClassId,
                                                    H: $value1.H ? $value1.H : 0,
                                                    W: $value1.W ? $value1.W : 0,
                                                    Q: $value1.Q ? $value1.Q : 1,
                                                    PricePattern: $value1.PricePattern,
                                                    item_id: $value1.item ? $value1.item.ItemId : 0,
                                                    type: $value1.type,
                                                    height: $value1.height ? $value1.height : 0,
                                                    width: $value1.width ? $value1.width : 0,
                                                    quantity: $value1.quantity ? $value1.quantity : 1,
                                                    ParentItemClassId: $value1.ParentItemClassId,
                                                    saleprice: $value1.saleprice,
                                                    price: $value1.price,
                                                });
                                            }
                                        } else {
                                            product.classes.push($value1);
                                        }
                                    });
                                    products.push(product);
                                });
                            });
                            angular.forEach(scope.quotation.Otherproducts, function($value, $key) {
                                if ($value.saved == true) {
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
                                        rate_id: scope.quotation.rate.Value1,
                                        rate: scope.quotation.rate.Value1,
                                    };
                                    others.push(other);
                                }
                            });
                            $http({
                                method: "POST",
                                responseType: "json",
                                data: {
                                    products: products,
                                    others: others,
                                    rate_id: scope.quotation.rate.Value1,
                                    rate: scope.quotation.rate.Value1,
                                    quotation_id: scope.quotation.id
                                },
                                url: '/quotations/add-detail/',
                            }).then((response) => {
                                scope.dialogOpenAlert = false;
                                if (response.data.status == 1) {
                                    setTimeout(()=>{
                                        scope.dialogOpenAlert = true;
                                        scope.message = _LANGS['[_save_success_reload_]'];
                                        scope.alert_type = 'success';
                                        scope.$apply();
                                        setTimeout(function() {
                                            window.location.href = response.data._redirect_url;
                                            scope.quotation.saved = false;
                                        },2000);
                                    },1000);

                                }else{
                                    setTimeout(()=>{
                                        scope.dialogOpenAlert = true;
                                        scope.message = response.data.message || "Unknown error";
                                        scope.alert_type = 'error';
                                        scope.$apply();
                                    },1000);
                                }
                            }, function(error) {
                                scope.dialogOpenAlert = false;
                                scope.quotation.saved = false;
                                scope.$apply();
                                setTimeout(()=>{
                                    scope.dialogOpenAlert = true;
                                    scope.message = data.message || "Unknown error";
                                    scope.alert_type = _LANGS._error_ + "!!!";
                                    scope.$apply();
                                },1000);
                            });
                        }
                    }, function(error) {
                        scope.quotation.saved = false;
                        alert(_LANGS._error_ + "!!!");
                    });
                }else{
                    scope.dialogOpenAlert = true;
                    scope.message = _LANGS['[_please_enter_all_info_]'];
                    scope.alert_type = 'error';
                    scope.$apply();
                }
                return false;
            });
        }
    };
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
                            var data = {
                                ItemId: scope.classRoot.item ? scope.classRoot.item.ItemId : 0,
                                Class: scope.product.Class,
                                ClassKey: scope.product.ClassKey,
                                Width: scope.classRoot.width,
                                Height: scope.classRoot.height,
                            };
                            scope.ReloadItem(data);
                        }
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
                        var data = {
                            ItemId: scope.classRoot.item ? scope.classRoot.item.ItemId : 0,
                            Class: scope.product.Class,
                            ClassKey: scope.product.ClassKey,
                            Width: scope.classRoot.width,
                            Height: scope.classRoot.height,
                        };
                        scope.ReloadItem(data);
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
                if (!scope.Otherproduct.price || scope.Otherproduct.price < 1) {
                    scope.Otherproduct.discount = 0;
                    scope.Otherproduct.discount2 = 0;
                    if (scope.Otherproduct.discount1 > 100 || scope.Otherproduct.discount1 < 0) {
                        alert("discount min:0%, max:100%");
                        scope.Otherproduct.discount1 = $o.discount1;
                        return false;
                    }
                } else {
                    try {
                        if ($n && $n != $o && scope.Otherproduct.discount_active == 1 && parseFloat(scope.Otherproduct.price) > 0) {
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
                    } catch (e) {}
                    try {
                        if ($n && $n != $o && scope.Otherproduct.discount_active == 2) {
                            if (parseFloat(scope.Otherproduct.discount2) > parseFloat(scope.Otherproduct.price) || parseFloat(scope.Otherproduct.discount2) < 0) {
                                alert("discount min :0 " + scope.quotation.rate.ClassName + ", max:" + scope.Otherproduct.price + " " + scope.quotation.rate.ClassName);
                                scope.Otherproduct.discount2 = $o.discount2.formatPrice();
                                return false;
                            }
                            var discount1 = 0;
                            discount1 = (parseFloat(scope.Otherproduct.discount2) / parseFloat(scope.Otherproduct.price)) * 100;
                            discount1 = discount1;
                            scope.Otherproduct.discount1 = discount1;
                            scope.Otherproduct.discount = scope.Otherproduct.discount2;
                        }
                    } catch (e) {}
                }
            }, true);
        }
    }
}]);
App.directive('classitem', function() {
    return {
        require: 'ngModel',
        restrict: 'A',
        replace: false,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs) {
            scope.$watch("itemClass.price", function($n, $o) {
                if ($n != $o) {
                    if (scope.product) {
                        if (scope.itemClass.saved == true) {
                            return scope.itemClass.saved = false;
                        } else {
                            if (scope.itemClass.type == 0) {
                                scope.product.Classes.forEach(($val, $key) => {
                                    if (NotPlus.includes($val.PricePattern) && $val.ItemClassId != scope.itemClass.ItemClassId) {
                                        scope.getPrice($val);
                                    }
                                });
                            }
                        }
                    }
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
App.directive('inputformatprice', ['$filter', function($filter) {
    return {
        require: 'ngModel',
        restrict: 'A',
        link: function(scope, element, attrs, ctrl) {
            //element.attr('placeholder',_LANGS._enter_price_);
            ctrl.$parsers.push(function(input) {
                if (!angular.isUndefined(input)) {
                    try {
                        var inputNumber = input.toString().replace(/[^0-9]/g, '');
                        ctrl.$setViewValue(inputNumber.formatPrice(scope.quotation.rate.ClassFullName));
                        ctrl.$render();
                    } catch (e) {}
                    return inputNumber;
                }
            });
            scope.$watch(function() {
                return ctrl.$modelValue;
            }, function() {
                if (ctrl.$modelValue) {
                    element.val(ctrl.$modelValue.formatPrice(scope.quotation.rate.ClassFullName));
                }
            });
        }
    };
}]);
App.directive('inputformatrate', ['$filter', function($filter) {
    return {
        require: 'ngModel',
        restrict: 'A',
        link: function(scope, element, attrs, ctrl) {
            //element.attr('placeholder',_LANGS._enter_price_);
            ctrl.$parsers.push(function(input) {
                if (!angular.isUndefined(input)) {
                    try {
                        var inputNumber = input.toString().replace(/[^0-9]/g, '');
                        ctrl.$setViewValue(inputNumber.formatPrice(scope.quotation.rate.ClassFullName));
                        ctrl.$render();
                    } catch (e) {}
                    return inputNumber;
                }
            });
            scope.$watch(function() {
                return ctrl.$modelValue;
            }, function() {
                if (ctrl.$modelValue) {
                    element.val(ctrl.$modelValue.formatPrice(scope.quotation.rate.ClassFullName));
                }
            });
        }
    };
}]);
App.directive('inputformatnumber', function() {
    return {
        require: 'ngModel',
        restrict: 'A',
        link: function(scope, element, attrs, ctrl) {
            //element.attr('placeholder',_LANGS._enter_number_)
            ctrl.$parsers.push(function(input) {
                if (!angular.isUndefined(input)) {
                    try {
                        var inputNumber = input.toString().replace(/[^0-9.]/g, '');
                        ctrl.$setViewValue(inputNumber);
                        ctrl.$render();
                    } catch (e) {}
                }
                return inputNumber;
            });
            scope.$watch(function() {
                return ctrl.$modelValue;
            }, function() {
                if (ctrl.$modelValue) {
                    element.val(ctrl.$modelValue);
                }
            });
        }
    };
});
App.directive('inputformatnumberquantity', function() {
    return {
        require: 'ngModel',
        restrict: 'A',
        link: function(scope, element, attrs, ctrl) {
            //element.attr('placeholder',_LANGS._enter_number_)
            ctrl.$parsers.push(function(input) {
                if (!angular.isUndefined(input)) {
                    try {
                        var inputNumber = input.toString().replace(/[^0-9]/g, '');
                        ctrl.$setViewValue(inputNumber);
                        ctrl.$render();
                    } catch (e) {}
                }
                return inputNumber;
            });
            scope.$watch(function() {
                return ctrl.$modelValue;
            }, function() {
                if (ctrl.$modelValue) {
                    element.val(ctrl.$modelValue);
                }
            });
        }
    };
});
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
                minDate: scope.min
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
                        if (element.val()) {
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
App.directive('select2customer', ['$http', function($http) {
    return {
        // A = attribute, E = Element, C = Class and M = HTML Comment
        restrict: 'A',
        template: ` <select ng-model="quotation.customer" ng-options='option as option.authorized_name for option in customers track by option.id' class="form-control" id="customer_id" validate="true" data-validate="required">
            <option value="">--` + _LANGS._choose_ + ` ` + _LANGS._customer_ + `--</option>
        </select>`,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs, ctrl) {
            $http({
                url: '/quotations/get-customers',
                method: "GET",
                responseType: "json",
            }).then(
                (response) => {
                    var data = response.data;
                    if (data.status == 1) {
                        scope.customers = data.data;
                        setTimeout(() => {
                            element.find('select').select2({
                                placeholder: _LANGS._select_ + " " + _LANGS._customer_,
                                maximumSelectionSize: 6,
                            });
                            if (scope.quotation.customer) {
                                element.find('select').select2("val", scope.quotation.customer.id);
                            } else {
                                element.find('select').select2("val", "")
                            }
                        }, 200);
                    }
                }, (errors) => {})
        }
    }
}]);
App.directive('select2construction', ['$http', function($http) {
    return {
        // A = attribute, E = Element, C = Class and M = HTML Comment
        restrict: 'A',
        template: ` <select ng-model="quotation.construction" ng-options='option as option.name for option in constructions track by option.id' class="form-control" id="construction_id" validate="true" data-validate="required">
            <option value="">--` + _LANGS._choose_ + ` ` + _LANGS._construction_ + `--</option>
        </select>`,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs, ctrl) {
            $http({
                url: '/quotations/get-constructions',
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
                            if (scope.quotation.construction) {
                                element.find('select').select2("val", scope.quotation.construction.id);
                            } else {
                                element.find('select').select2("val", "");
                            }
                        }, 200)
                    }
                }, (errors) => {})
        }
    }
}]);
App.directive('select2branch', ['$http', function($http) {
    return {
        // A = attribute, E = Element, C = Class and M = HTML Comment
        restrict: 'A',
        template: ` <select ng-model="quotation.branch" ng-options='option as option.name for option in branchs track by option.id' class="form-control" id="branch_id" validate="true" data-validate="required"></select>`,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs, ctrl) {
            $http({
                url: '/quotations/get-branchs',
                method: "GET",
                responseType: "json",
            }).then(
                (response) => {
                    var data = response.data;
                    if (data.status == 1) {
                        scope.branchs = data.data;
                        setTimeout(() => {
                            element.find('select').select2({
                                placeholder: _LANGS._select_ + " " + _LANGS._branch_,
                                maximumSelectionSize: 6,
                            });
                            if (scope.quotation.branch) {
                                element.find('select').select2("val", scope.quotation.branch.id);
                            } else {
                                element.find('select').select2("val", "");
                            }
                        }, 200)
                    }
                }, (errors) => {})
        }
    }
}]);
App.directive('select2area', ['$http', function($http) {
    return {
        // A = attribute, E = Element, C = Class and M = HTML Comment
        restrict: 'A',
        template: ` <select ng-model="quotation.area" ng-options='option as option.name for option in areas track by option.id' class="form-control" id="area_id" validate="true" data-validate="required">
            <option value="">--` + _LANGS._choose_ + ` ` + _LANGS._area_ + `--</option>
        </select>`,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs, ctrl) {
            $http({
                url: '/quotations/get-areas',
                method: "GET",
                responseType: "json",
            }).then(
                (response) => {
                    var data = response.data;
                    if (data.status == 1) {
                        scope.areas = data.data;
                        setTimeout(() => {
                            element.find('select').select2({
                                placeholder: _LANGS._select_ + " " + _LANGS._area_,
                                maximumSelectionSize: 6,
                            });
                            if (scope.quotation.area) {
                                element.find('select').select2("val", scope.quotation.area.id);
                            } else {
                                element.find('select').select2("val", "");
                            }
                        }, 200);
                    }
                }, (errors) => {})
        }
    }
}]);
App.directive('select2status', ['$http', function($http) {
    return {
        // A = attribute, E = Element, C = Class and M = HTML Comment
        restrict: 'A',
        template: ` <select ng-model="quotation.status" ng-options='option as option.name for option in status track by option.id' class="form-control" id="status" validate="true" data-validate="required">
            <option value="">--` + _LANGS._choose_ + ` ` + _LANGS._status_ + `--</option>
        </select>`,
        //The link function is responsible for registering DOM listeners as well as updating the DOM.
        link: function(scope, element, attrs, ctrl) {
            $http({
                url: '/quotations/get-status/',
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
                            if (scope.quotation.status) {
                                element.find('select').select2("val", scope.quotation.status.id);
                            } else {
                                element.find('select').select2("val", "");
                            }
                        }, 200);
                    }
                }, (errors) => {});
        }
    }
}]);