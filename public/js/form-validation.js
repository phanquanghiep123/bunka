// JavaScript Document
(function($){
    $.fn.extend({ 
        validateform : function(options){
            defaults = {
                itemsFrom : {},
                message :_ValiDateMessege,
                formatDate :"yyyy/mm/dd",
                colorString : "red",
                fontsizeString : "12px",
                bindEvent : [],
                before : function(check,options){},
                after  : function (check,options){},
                beforeadderror:function(check,options,_childe,message,validatefunction){},
                afteradderror:function(check,options,_childe,message,validatefunction){},
                email : function($pramte1,$pramte2,$pramte3,$pramte4){
                    if($pramte2 != "" && $pramte2 != null){
                        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                        return re.test($pramte2);
                    }
                    return true;
                },
                number : function($pramte1,$pramte2,$pramte3,$pramte4){
                    if($pramte2 != "" && $pramte2 != null){
                        return $.isNumeric($pramte2);
                    }
                    return true;
                },
                min : function ($pramte1,$pramte2,$pramte3,$pramte4){
                    var bpramte3 = $pramte3[1];
                    if($pramte2 != "" && $pramte2 != null){
                        if( $pramte1 == "password" ){
                            return ($pramte2.length >= bpramte3);
                        }
                        if( $pramte1 == "email" ){
                            return ($pramte2.length >= bpramte3);
                        }
                        if( $pramte1 == "text" ){
                            return ($pramte2.length >= bpramte3);
                        }
                        if($pramte1 != "number" && $pramte1 != "date"){
                            return ($pramte2.length >= bpramte3);
                        }
                        if( $pramte1 == "number" ){
                            return ($pramte2 >= bpramte3);
                        }
                        if($pramte1 == "date"){
                            var date1 = new Date($pramte2);
                            var date2 = new Date(bpramte3);
                            return ($date1 >= $date2);
                        }   
                    }
                    return true;    
                    
                },
                price : function($pramte1,$pramte2,$pramte3,$pramte4){
                    var regex = /(?=.*\d)^\$?(([1-9]\d{0,2}(,\d{3})*)|0)?(\.\d{1,2})?$/;
                    return regex.test($pramte2);
                },
                max : function ($pramte1,$pramte2,$pramte3,$pramte4){
                    var bpramte3 = $pramte3[1];
                    if($pramte2 != "" && $pramte2 != null){
                        if($pramte1 == "text" ){
                            return ($pramte2.length <= bpramte3);
                        }
                        if($pramte1 == "number"){
                            return ($pramte2 <= bpramte3);
                        }
                        if($pramte1 == "date"){
                            var date1 = new Date($pramte2);
                            var date2 = new Date(bpramte3);
                            return ($date1 <= $date2);
                        } 
                    }  
                    return true;
                },
                date : function ($pramte1,$pramte2,$pramte3,$pramte4){
                    if($pramte2 != "" && $pramte2 != null){
                        var dtRegex = new RegExp(/\b\d{1,2}[\/-]\d{1,2}[\/-]\d{4}\b/);
                        return dtRegex.test($pramte2);
                    }
                    return true;
                },
                required : function ($pramte1,$pramte2,$pramte3,$pramte4){
                    if($pramte1 == "checkbox") return ($pramte4).is(':checked'); 
                    return ( $pramte2 != null && $pramte2 != "" );
                },
                same : function ($pramte1,$pramte2,$pramte3,$pramte4){
                    var bpramte3 = $pramte3[1];
                    if($pramte2 != "" && $pramte2 != null){
                        var samdata = bpramte3.split(",");
                        return ($.inArray($pramte2,samdata) != -1);
                    }
                    return true;
                },
                match : function ($pramte1,$pramte2,$pramte3,$pramte4){
                    var element = $pramte4.closest("form").find('[name='+$pramte3[1]+']');
                    if(element.length > 0){
                        return $pramte2.trim() == element.val();
                    }
                    return true;
                },
                url : function  ($pramte1,$pramte2,$pramte3,$pramte4){
                    if($pramte2 != "" && $pramte2 != null){
                        var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
                        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
                        '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
                        '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
                        '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
                        return !!pattern.test($pramte2);
                    }
                    return true;
                },
                phone : function ($pramte1,$pramte2,$pramte3,$pramte4){
                    if($pramte2 != "" && $pramte2 != null){
                        var filter = /^[0-9-+]+$/;
                        return filter.test($pramte2);
                    }
                    return true;
                },

                addError : function(key,error){
                    try
                    {
                        this.itemsFrom[key].errors = error;
                        this.itemsFrom[key].error = 1;
                    }catch(e){}
                    
                },
                showError : function (){
                    $.each(this.itemsFrom,function(key,value){
                        try
                        {
                            if(value.error == 1){
                                var element = value;
                                _childe = value.element;
                                var showMessenge = _childe;
                                if(typeof _childe.attr("data-validate-show") !== "undefined"){
                                    showMessenge = $(_childe.attr("data-validate-show"));
                                }
                                if (_childe.parent().hasClass("input-group")) {
                                    showMessenge = _childe.parent();
                                }
                                showMessenge.parent().find(".validate-error").remove();
                                if(options.beforeadderror(false,options,_childe,value.errors,argAutofunction[0]) == false) return false;
                                var html = "";
                                if(typeof value.errors == "object"){
                                    $.each(value.errors,function(key,value){
                                        html +='<p class="validate-error error" style="color:'+options.colorString+'; font-size:'+options.fontsizeString+'"><span>'+value+'</span></p>';
                                    });
                                }else if(typeof value.errors == "string"){
                                    html +='<p class="validate-error error" style="color:'+options.colorString+'; font-size:'+options.fontsizeString+'"><span>'+value.errors+'</span></p>';
                                }  
                                showMessenge.after(html);
                                if(options.afteradderror(false,options,_childe,value.errors,argAutofunction[0]) == false) return false;
                            } 
                        }catch(e){}
                          
                    });
                },
                Invalid : false,
                checkInvalid  : function(r = false){
                    try{
                        var Invalid = true;
                        $.each(_this.find("[validate=true]"),function(key,value){
                            _childe = $(this);
                            type  = _childe.data("validate-type");
                            if(typeof type === "undefined") type = _childe.attr("validate-type");
                            if(typeof type === "undefined") type = "text"; 
                            if(type != "number" && type != "date" && type != "checkbox" && type != "radio"){
                                type = "text";
                            }
                            validateData = _childe.attr("data-validate");
                            functionAuto = validateData.split("|");
                            var showMessenge = _childe;
                            if(typeof _childe.attr("data-validate-show") !== "undefined"){
                                showMessenge = $(_childe.attr("data-validate-show"));
                            }
                            if (_childe.parent().hasClass("input-group")) {
                                showMessenge = _childe.parent();
                            }
                            if(r == false)
                                showMessenge.parent().find(".validate-error").remove();
                            valueInput = _childe.val(); 
                            $.each(functionAuto,function(key ,value){
                                argAutofunction = value.split(":");
                                var checkdata   = options[argAutofunction[0]](type,valueInput,argAutofunction,_childe);                            
                                if(!checkdata){          
                                    Invalid = false;    

                                    if(argAutofunction[0] == "min" || argAutofunction[0] == "max"){
                                        message_error = options.message[argAutofunction[0] + "-" + type];
                                    }else{
                                        message_error = options.message[argAutofunction[0]];
                                    }
                                    if(argAutofunction[0] == "match"){
                                        if(typeof argAutofunction[2] !== "undefined"){ 
                                            message_error = message_error.replace("{0}",argAutofunction[2]);
                                        }
                                        if(typeof argAutofunction[3] !== "undefined"){
                                            message_error = message_error.replace("{1}",argAutofunction[3]);
                                        }   
                                        if(typeof argAutofunction[4] !== "undefined"){
                                            message_error = message_error.replace("{2}",argAutofunction[4]);
                                        }
                                        if(typeof argAutofunction[5] !== "undefined"){
                                            message_error = message_error.replace("{3}",argAutofunction[5]);
                                        }
                                        if(typeof argAutofunction[6] !== "undefined"){
                                            message_error = message_error.replace("{4}",argAutofunction[6]);
                                        }
                                    }else{
                                        if(typeof argAutofunction[1] !== "undefined"){ 
                                            message_error = message_error.replace("{0}",argAutofunction[1]);
                                        }
                                        if(typeof argAutofunction[2] !== "undefined"){
                                            message_error = message_error.replace("{1}",argAutofunction[2]);
                                        }   
                                        if(typeof argAutofunction[3] !== "undefined"){
                                            message_error = message_error.replace("{2}",argAutofunction[3]);
                                        }
                                        if(typeof argAutofunction[4] !== "undefined"){
                                            message_error = message_error.replace("{3}",argAutofunction[4]);
                                        }
                                        if(typeof argAutofunction[5] !== "undefined"){
                                            message_error = message_error.replace("{4}",argAutofunction[4]);
                                        }
                                    }
                                    
                                    if(options.beforeadderror(checkdata,options,_childe,message_error,argAutofunction[0]) == false) return false;
                                    if(r == false)
                                        showMessenge.after('<p class="validate-error error" style="color:'+options.colorString+'; font-size:'+options.fontsizeString+'"><span>'+message_error+'</span></p>');
                                    if(options.afteradderror(checkdata,options,_childe,message_error,argAutofunction[0]) == false) return false;
                                    return false;
                                } 
                            });
                        });
                        this.Invalid = Invalid;
                        Invalid = true;
                    }catch (err){
                        console.log(err);
                    } 
                    return this.Invalid;
                }        
            }
            var _this = this;
            var _childe; 
            var message;
            try{
                message = Object.assign(defaults.message,options.message);
            }catch(e){
                message = defaults.message;
            }
            var options     = Object.assign(defaults,options); 
            options.message = message;
            var valueInput;
            var type = "text";
            var eval_string = "";
            var validateData ;
            var functionAuto;
            var argAutofunction;
            var check = true;
            var message_error = "";
            var showMessenge = null;
            /*run plugin*/
            options.before(check,options);
            init ();
            options.after(check,options);
            return options;
            function init (){
                _this.find(".validate-error").remove();
                $.each(_this.find("[validate=true]"),function(key,value){
                    _childe = $(this);
                    var name = _childe.attr("name");
                    defaults.itemsFrom[name] = {
                        element : $(this),
                        errors : [],
                        error : 0
                    };
                    type  = $(this).data("validate-type");
                    if(typeof type === "undefined") type = $(this).attr("type");
                    if(typeof type === "undefined") type = "text"; 
                    if(type != "number" && type != "date"){
                        type = "text";
                    }
                    validateData = $(this).attr("data-validate");
                    functionAuto = validateData.split("|");
                    $(this).on("focus",function(){
                        options.Invalid = false;
                    });
                     
                });  
            }   
        }
    })
})(jQuery);
