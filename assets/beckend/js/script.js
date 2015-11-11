var App = function() {
    var e = "",
        t = !1,
        i = !1,
        n = !1,
        o = !1,
        a = [],
        s = function() {
            for (var e in a) {
                var t = a[e];
                t.call()
            }
        }, r = function() {
            var e = window,
                t = "inner";
            return "innerWidth" in window || (t = "client", e = document.documentElement || document.body), {
                width: e[t + "Width"],
                height: e[t + "Height"]
            }
        }, l = function() {
            n = $("#sidebar").hasClass("mini-menu"), o = $("#header").hasClass("navbar-fixed-top")
        }, c = function() {
            var e, t = $("#content"),
                i = $("#sidebar"),
                n = $("body");
            e = n.hasClass("sidebar-fixed") ? $(window).height() - $("#header").height() + 1 : i.height() + 20, e >= t.height() && t.attr("style", "min-height:" + e + "px !important")
        }, d = function() {
            jQuery(".sidebar-menu .has-sub > a").click(function() {
                var e = jQuery(".has-sub.open", $(".sidebar-menu"));
                e.removeClass("open"), jQuery(".arrow", e).removeClass("open"), jQuery(".sub", e).slideUp(200);
                var t = $(this),
                    i = -200,
                    n = 200,
                    o = jQuery(this).next();
                o.is(":visible") ? (jQuery(".arrow", jQuery(this)).removeClass("open"), jQuery(this).parent().removeClass("open"), o.slideUp(n, function() {
                    0 == $("#sidebar").hasClass("sidebar-fixed") && App.scrollTo(t, i), c()
                })) : (jQuery(".arrow", jQuery(this)).addClass("open"), jQuery(this).parent().addClass("open"), o.slideDown(n, function() {
                    0 == $("#sidebar").hasClass("sidebar-fixed") && App.scrollTo(t, i), c()
                }))
            }), jQuery(".sidebar-menu .has-sub .sub .has-sub-sub > a").click(function() {
                var e = jQuery(".has-sub-sub.open", $(".sidebar-menu"));
                e.removeClass("open"), jQuery(".arrow", e).removeClass("open"), jQuery(".sub", e).slideUp(200);
                var t = jQuery(this).next();
                t.is(":visible") ? (jQuery(".arrow", jQuery(this)).removeClass("open"), jQuery(this).parent().removeClass("open"), t.slideUp(200)) : (jQuery(".arrow", jQuery(this)).addClass("open"), jQuery(this).parent().addClass("open"), t.slideDown(200))
            })
        }, u = function() {
            var e = document.getElementById("sidebar-collapse").querySelector('[class*="fa-"]'),
                i = e.getAttribute("data-icon1"),
                n = e.getAttribute("data-icon2");
            jQuery(".navbar-brand").addClass("mini-menu"), jQuery("#sidebar").addClass("mini-menu"), jQuery("#main-content").addClass("margin-left-50"), jQuery(".sidebar-collapse i").removeClass(i), jQuery(".sidebar-collapse i").addClass(n), jQuery(".search").attr("placeholder", ""), t = !0
        }, h = function() {
            var e = $(window).width();
            if (768 > e) i = !0, jQuery("#main-content").addClass("margin-left-0");
            else {
                i = !1, jQuery("#main-content").removeClass("margin-left-0");
                var t = $(".sidebar");
                1 === t.parent(".slimScrollDiv").size() && (t.slimScroll({
                    destroy: !0
                }), t.removeAttr("style"), $("#sidebar").removeAttr("style"))
            }
        }, m = function() {
            jQuery(".sidebar-collapse > i").click(function() {
                if (i && !n) t ? (jQuery("body").removeClass("slidebar"), jQuery(".sidebar").removeClass("sidebar-fixed"), o && (jQuery("#header").addClass("navbar-fixed-top"), jQuery("#main-content").addClass("margin-top-100")), t = !1) : (jQuery("body").addClass("slidebar"), jQuery(".sidebar").addClass("sidebar-fixed"), o && (jQuery("#header").removeClass("navbar-fixed-top"), jQuery("#main-content").removeClass("margin-top-100")), t = !0, p());
                else {
                    var e = document.getElementById("sidebar-collapse").querySelector('[class*="fa-"]'),
                        a = e.getAttribute("data-icon1"),
                        s = e.getAttribute("data-icon2");
                    t ? (jQuery(".navbar-brand").removeClass("mini-menu"), jQuery("#sidebar").removeClass("mini-menu"), jQuery("#main-content").removeClass("margin-left-50"), jQuery(".sidebar-collapse i").removeClass(s), jQuery(".sidebar-collapse i").addClass(a), jQuery(".search").attr("placeholder", "Search"), t = !1) : (jQuery(".navbar-brand").addClass("mini-menu"), jQuery("#sidebar").addClass("mini-menu"), jQuery("#main-content").addClass("margin-left-50"), jQuery(".sidebar-collapse i").removeClass(a), jQuery(".sidebar-collapse i").addClass(s), jQuery(".search").attr("placeholder", ""), t = !0)
                }
            })
        }, p = function() {
            var e = $(".sidebar");
            1 === e.parent(".slimScrollDiv").size() && (e.slimScroll({
                destroy: !0
            }), e.removeAttr("style"), $("#sidebar").removeAttr("style")), e.slimScroll({
                size: "7px",
                color: "#a1b2bd",
                opacity: .3,
                height: "100%",
                allowPageScroll: !1,
                disableFadeOut: !1
            })
        }, f = function() {
            var e = $(".sidebar-menu");
            if (1 === e.parent(".slimScrollDiv").size() && (e.slimScroll({
                destroy: !0
            }), e.removeAttr("style"), $("#sidebar").removeAttr("style")), 0 === $(".sidebar-fixed").size()) return c(), void 0;
            var t = r();
            if (t.width >= 992) {
                var i = $(window).height() - $("#header").height() + 1;
                e.slimScroll({
                    size: "7px",
                    color: "#a1b2bd",
                    opacity: .3,
                    height: i,
                    allowPageScroll: !1,
                    disableFadeOut: !1
                }), c()
            }
        };
    jQuery(window).resize(function() {
        c(), h(), f(), ft(), setTimeout(function() {
            s()
        }, 50)
    });
    var g = function() {
        $("#reportrange").daterangepicker({
            startDate: moment().subtract("days", 29),
            endDate: moment(),
            minDate: "01/01/2012",
            maxDate: "12/31/2014",
            dateLimit: {
                days: 60
            },
            showDropdowns: !0,
            showWeekNumbers: !0,
            timePicker: !1,
            timePickerIncrement: 1,
            timePicker12Hour: !0,
            ranges: {
                Yesterday: [moment().subtract("days", 1), moment().subtract("days", 1)],
                "Last 30 Days": [moment().subtract("days", 29), moment()],
                "This Month": [moment().startOf("month"), moment().endOf("month")]
            },
            opens: "left",
            buttonClasses: ["btn btn-default"],
            applyClass: "btn-small btn-primary",
            cancelClass: "btn-small",
            format: "MM/DD/YYYY",
            separator: " to ",
            locale: {
                applyLabel: "Submit",
                fromLabel: "From",
                toLabel: "To",
                customRangeLabel: "Custom Range",
                daysOfWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                firstDay: 1
            }
        }, function(e, t) {
            console.log("Callback has been called!"), $("#reportrange span").html(e.format("MMMM D, YYYY") + " - " + t.format("MMMM D, YYYY"))
        }), $("#reportrange span").html("Custom")
    }, v = function() {
            y(), $(".project-switcher-btn").click(function(i) {
                i.preventDefault(), e(this), $(this).parent().toggleClass("open");
                var n = t(this);
                $(n).slideToggle(200, function() {
                    $(this).toggleClass("open")
                })
            }), $("body").click(function(t) {
                var i = t.target.className.split(" "); - 1 == $.inArray("project-switcher", i) && -1 == $.inArray("project-switcher-btn", i) && -1 == $(t.target).parents().index($(".project-switcher")) && 0 == $(t.target).parents(".project-switcher-btn").length && e()
            }), $(".project-switcher #frame").each(function() {
                $(this).slimScrollHorizontal({
                    width: "100%",
                    alwaysVisible: !0,
                    color: "#fff",
                    opacity: "0.5",
                    size: "5px"
                })
            });
            var e = function(e) {
                $(".project-switcher").each(function() {
                    var i = $(this);
                    if (i.is(":visible")) {
                        var n = t(e);
                        n != "#" + i.attr("id") && $(this).slideUp(200, function() {
                            $(this).toggleClass("open"), $(".project-switcher-btn").each(function() {
                                var e = t(this);
                                e == "#" + i.attr("id") && $(this).parent().removeClass("open")
                            })
                        })
                    }
                })
            }, t = function(e) {
                    var t = $(e).data("projectSwitcher");
                    return "undefined" == typeof t && (t = "#project-switcher"), t
                }
        }, y = function() {
            $(".project-switcher").each(function() {
                var e = $(this);
                e.css("position", "absolute").css("margin-top", "-1000px").show();
                var t = 0;
                $("ul li", this).each(function() {
                    t += $(this).outerWidth(!0) + 15
                }), e.css("position", "relative").css("margin-top", "0").hide(), $("ul", this).width(t)
            })
        }, _ = function() {
            $(".tip").tooltip(), $(".tip-bottom").tooltip({
                placement: "bottom"
            }), $(".tip-left").tooltip({
                placement: "left"
            }), $(".tip-right").tooltip({
                placement: "right"
            }), $(".tip-focus").tooltip({
                trigger: "focus"
            })
        }, b = function() {
            jQuery(".box .tools .collapse, .box .tools .expand").click(function() {
                var e = jQuery(this).parents(".box").children(".box-body");
                if (jQuery(this).hasClass("collapse")) {
                    jQuery(this).removeClass("collapse").addClass("expand");
                    var t = jQuery(this).children(".fa-chevron-up");
                    t.removeClass("fa-chevron-up").addClass("fa-chevron-down"), e.slideUp(200)
                } else {
                    jQuery(this).removeClass("expand").addClass("collapse");
                    var t = jQuery(this).children(".fa-chevron-down");
                    t.removeClass("fa-chevron-down").addClass("fa-chevron-up"), e.slideDown(200)
                }
            }), jQuery(".box .tools a.remove").click(function() {
                var e = jQuery(this).parents(".box");
                e.next().hasClass("box") || e.prev().hasClass("box") ? jQuery(this).parents(".box").remove() : jQuery(this).parents(".box").parent().remove()
            }), jQuery(".box .tools a.reload").click(function() {
                var e = jQuery(this).parents(".box");
                App.blockUI(e), window.setTimeout(function() {
                    App.unblockUI(e)
                }, 1e3)
            })
        }, w = function() {
            jQuery().slimScroll && $(".scroller").each(function() {
                $(this).slimScroll({
                    size: "7px",
                    color: "#a1b2bd",
                    height: $(this).attr("data-height"),
                    alwaysVisible: "1" == $(this).attr("data-always-visible") ? !0 : !1,
                    railVisible: "1" == $(this).attr("data-rail-visible") ? !0 : !1,
                    railOpacity: .1,
                    disableFadeOut: !0
                })
            })
        }, x = function() {
            $(".basic-alert").click(function() {
                bootbox.alert("Hello World")
            }), $(".confirm-dialog").click(function() {
                bootbox.confirm("Are you sure?", function() {})
            }), $(".multiple-buttons").click(function() {
                bootbox.dialog({
                    message: "I am a custom dialog",
                    title: "Custom title",
                    buttons: {
                        success: {
                            label: "Success!",
                            className: "btn-success",
                            callback: function() {
                                Example.show("great success")
                            }
                        },
                        danger: {
                            label: "Danger!",
                            className: "btn-danger",
                            callback: function() {
                                Example.show("uh oh, look out!")
                            }
                        },
                        main: {
                            label: "Click ME!",
                            className: "btn-primary",
                            callback: function() {
                                Example.show("Primary button")
                            }
                        }
                    }
                })
            }), $(".multiple-dialogs").click(function() {
                bootbox.alert("In 1 second a new modal will open"), setTimeout(function() {
                    bootbox.dialog({
                        message: "Will you purchase this awesome theme",
                        title: "Pop quiz",
                        buttons: {
                            success: {
                                label: "Yes!",
                                className: "btn-success",
                                callback: function() {
                                    bootbox.alert("Congratulations! You made the right decision.", function() {
                                        $(".bootbox").modal("hide")
                                    })
                                }
                            },
                            danger: {
                                label: "No!",
                                className: "btn-danger",
                                callback: function() {
                                    bootbox.alert("Oops, we're sorry to hear that!", function() {
                                        $(".bootbox").modal("hide")
                                    })
                                }
                            },
                            main: {
                                label: "Click ME!",
                                className: "btn-primary",
                                callback: function() {
                                    bootbox.alert("Hello World", function() {
                                        $(".bootbox").modal("hide")
                                    })
                                }
                            }
                        }
                    })
                }, 1e3)
            }), $(".programmatic-close").click(function() {
                bootbox.alert("In 3 second this modal will close.."), setTimeout(function() {
                    $(".bootbox").modal("hide")
                }, 3e3)
            })
        }, k = function() {
            $(".pop").popover(), $(".pop-bottom").popover({
                placement: "bottom"
            }), $(".pop-left").popover({
                placement: "left"
            }), $(".pop-top").popover({
                placement: "top"
            }), $(".pop-hover").popover({
                trigger: "hover"
            })
        }, I = function() {
            $("#normal").click(function() {
                var e = $("input[name=theme]:checked").val(),
                    t = $("input[name=position]:checked").val();
                Messenger.options = {
                    extraClasses: "messenger-fixed " + t,
                    theme: e
                }, Messenger().post({
                    message: "This is a normal notification!",
                    showCloseButton: !0
                })
            }), $("#interactive").click(function() {
                var e = $("input[name=theme]:checked").val(),
                    t = $("input[name=position]:checked").val();
                Messenger.options = {
                    extraClasses: "messenger-fixed " + t,
                    theme: e
                };
                var i;
                i = Messenger().post({
                    message: "Launching thermonuclear war...",
                    type: "info",
                    actions: {
                        cancel: {
                            label: "cancel launch",
                            action: function() {
                                return i.update({
                                    message: "Thermonuclear war averted",
                                    type: "success",
                                    showCloseButton: !0,
                                    actions: !1
                                })
                            }
                        }
                    }
                })
            }), $("#timer").click(function() {
                var e = $("input[name=theme]:checked").val(),
                    t = $("input[name=position]:checked").val();
                Messenger.options = {
                    extraClasses: "messenger-fixed " + t,
                    theme: e
                };
                var i;
                i = 0, Messenger().run({
                    errorMessage: "Error destroying alien planet",
                    successMessage: "Alien planet destroyed!",
                    showCloseButton: !0,
                    action: function(e) {
                        return ++i < 3 ? e.error({
                            status: 500,
                            readyState: 0,
                            responseText: 0
                        }) : e.success()
                    }
                })
            }), $("#prompts").click(function() {
                var e = $("input[name=theme]:checked").val(),
                    t = $("input[name=position]:checked").val();
                Messenger.options = {
                    extraClasses: "messenger-fixed " + t,
                    theme: e
                }, Messenger().run({
                    successMessage: "Data saved.",
                    errorMessage: "Error saving data",
                    progressMessage: "Saving data",
                    showCloseButton: !0
                }, {
                    url: "http://www.example.com/data"
                })
            })
        }, C = function() {
            $(".alert").alert()
        }, E = function() {
            for (var e = [], t = "New York,Los Angeles,Chicago,Houston,Paris,Marseille,Toulouse,Lyon,Bordeaux,Philadelphia,Phoenix,San Antonio,San Diego,Dallas,San Jose,Jacksonville".split(","), i = 0; i < t.length; i++) e.push({
                id: i,
                name: t[i],
                status: i % 2 ? "Already Visited" : "Planned for visit",
                coolness: Math.floor(10 * Math.random()) + 1
            });
            $("#ms1").magicSuggest({
                data: e,
                sortOrder: "name",
                value: [0],
                selectionPosition: "right",
                groupBy: "status",
                maxDropHeight: 200
            }), $("#ms2").magicSuggest({
                width: "80%",
                data: e
            }), $("#ms3").magicSuggest({
                selectionPosition: "bottom",
                renderer: function(e) {
                    return '<div><div style="font-family: Arial; font-weight: bold">' + e.name + "</div>" + "<div><b>Cooooolness</b>: " + e.coolness + "</div>" + "</div>"
                },
                minChars: 1,
                selectionStacked: !0,
                data: e
            }), $("#ms4").magicSuggest({
                data: [{
                    id: 1,
                    label: "one"
                }, {
                    id: 2,
                    label: "two"
                }, {
                    id: 3,
                    label: "three"
                }],
                displayField: "label",
                value: [1, 3]
            }), $("#ms5").magicSuggest({
                width: "80%",
                data: "marilyn@monroe.com,mother@teresa.com,john@kennedy.com,martin@luther.com,nelson@mandela.com,winston@churchill.com,bill@gates.com,muhammad@ali.com,mahatma@gandhi.com,margaret@thatcher.com,charles@gaulle.com,christopher@colombus.com,george@orwell.com,charles@darwin.com,elvis@presley.com,albert@einstein.com,paul@mccartney.com,queen@elizabeth.com,queen@victoria.com,john@keynes.com,mikhail@gorbachev.com,jawaharlal@nehru.com,leonardo@vinci.com,louis@pasteur.com,leo@tolstoy.com,pablo@picasso.com,vincent@gogh.com,franklin@roosevelt.com,john@paul.com,neil@armstrong.com,thomas@edison.com,rosa@parks.com,aung@kyi.com,lyndon@johnson.com,ludwig@beethoven.com,oprah@winfrey.com,indira@gandhi.com,eva@peron.com,benazir@bhutto.com,desmond@tutu.com,dalai@lama.com,walt@disney.com,peter@sellers.com,barack@obama.com,malcolm@x.com,richard@branson.com,jesse@owens.com,ernest@hemingway.com,john@lennon.com,henry@ford.com,haile@selassie.com,joseph@stalin.com,lord@baden.com,michael@jordon.com,george@bush.com,osama@laden.com,fidel@castro.com,oscar@wilde.com,coco@chanel.com,amelia@earhart.com,adolf@hitler.com,mary@magdalene.com,alfred@hitchcock.com,michael@jackson.com,mata@hari.com,emmeline@pankhurst.com,ronald@reagan.com,lionel@messi.com,babe@ruth.com,bob@geldof.com,leon@trotsky.com,roger@federer.com,sigmund@freud.com,woodrow@wilson.com,mao@zedong.com,katherine@hepburn.com,audrey@hepburn.com,david@beckham.com,tiger@woods.com,usain@bolt.com,bill@cosby.com,carl@lewis.com,prince@charles.com,jacqueline@onassis.com,billie@holiday.com,virginia@woolf.com,billie@king.com,kylie@minogue.com,anne@frank.com,emile@zatopek.com,lech@walesa.com,christiano@ronaldo.com,yoko@ono.com,julie@andrews.com,florence@nightingale.com,marie@curie.com,stephen@hawking.com,tim@lee.com,lady@gaga.com,lance@armstrong.com,jon@stewart.com,scarlett@johansson.com,larry@page.com,sergey@brin.com,roman@abramovich.com,rupert@murdoch.com,al@gore.com,sacha@baron.com,george@clooney.com,paul@krugman.com,jimmy@wales.com"
            }), $("#ms6").magicSuggest({}), $("#ms7").magicSuggest({
                data: e,
                resultAsString: !0,
                maxSelection: 1,
                maxSelectionRenderer: function() {}
            })
        }, T = function() {
            jQuery(document).ready(function() {
                var e = moment().format("YYYY-MM-DD HH:mm"),
                    t = moment().subtract("days", 1).format("MMM D, YYYY");
                $("#curr-time").html(e), $("#curr-time").attr("title", e), $("#curr-time").attr("data-original-title", e), $("#yesterday").html(t), $("#yesterday").attr("title", t), $("#yesterday").attr("data-original-title", t), jQuery("abbr.timeago").timeago()
            })
        }, B = function() {
            jQuery("abbr.timeago").timeago()
        }, A = function() {
            $(".datepicker").datepicker({
                defaultDate: 7,
                showOtherMonths: !0,
                autoSize: !0,
                appendText: '<span class="help-block">(dd-mm-yyyy)</span>',
                dateFormat: "dd-mm-yy"
            }), $(".inlinepicker").datepicker({
                inline: !0,
                showOtherMonths: !0
            }), $(".datepicker-fullscreen").pickadate(), $(".timepicker-fullscreen").pickatime(), $(".colorpicker").colorpicker();
            var e = $("#color-pickers")[0].style;
            $("#colorpicker-event").colorpicker().on("changeColor", function(t) {
                e.backgroundColor = t.color.toHex()
            })
        }, M = function() {
            $.fn.raty.defaults.path = "js/jquery-raty/img", $("#score-demo").raty({
                score: 3
            }), $("#number-demo").raty({
                number: 10
            }), $("#readOnly-demo").raty({
                readOnly: !0,
                score: 2
            }), $("#halfShow-true-demo").raty({
                score: 3.26
            }), $("#starHalf-demo").raty({
                path: "js/jquery-raty/img",
                half: !0,
                starOff: "cookie-off.png",
                starOn: "cookie-on.png",
                starHalf: "cookie-half.png"
            }), $("#star-off-and-star-on-demo").raty({
                path: "js/jquery-raty/img",
                starOff: "off.png",
                starOn: "on.png"
            }), $("#cancel-off-and-cancel-on-demo").raty({
                path: "js/jquery-raty/img",
                cancel: !0,
                cancelOff: "cancel-custom-off.png",
                cancelOn: "cancel-custom-on.png",
                starOn: "star-on.png",
                starOff: "star-off.png"
            }), $("#size-demo").raty({
                path: "js/jquery-raty/img",
                cancel: !0,
                cancelOff: "cancel-off-big.png",
                cancelOn: "cancel-on-big.png",
                half: !0,
                size: 24,
                starHalf: "star-half-big.png",
                starOff: "star-off-big.png",
                starOn: "star-on-big.png"
            }), $("#target-div-demo").raty({
                cancel: !0,
                target: "#target-div-hint"
            })
        }, S = function() {
            $(document).ready(function() {
                $("#btn-load").on("click", function() {
                    var e = $(this);
                    e.button("loading"), setTimeout(function() {
                        e.button("reset")
                    }, 1500)
                }), $("#btn-load-complete").on("click", function() {
                    var e = $(this);
                    e.button("loading"), setTimeout(function() {
                        e.button("complete")
                    }, 1500)
                })
            })
        }, j = function() {
            $(".radio1").on("switch-change", function() {
                $(".radio1").bootstrapSwitch("toggleRadioState")
            }), $(".radio1").on("switch-change", function() {
                $(".radio1").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio1").on("switch-change", function() {
                $(".radio1").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        }, P = function() {
            function e(e, t) {
                var i = $(t.handle).data("bs.tooltip").$tip[0],
                    n = $.extend({}, $(t.handle).offset(), {
                        width: $(t.handle).get(0).offsetWidth,
                        height: $(t.handle).get(0).offsetHeight
                    }),
                    o = i.offsetWidth;
                tp = {
                    left: n.left + n.width / 2 - o / 2
                }, $(i).offset(tp), $(i).find(".tooltip-inner").text(t.value)
            }
            $("#slider").slider({
                value: 15,
                slide: e,
                stop: e
            }), $("#slider .ui-slider-handle:first").tooltip({
                title: $("#slider").slider("value"),
                trigger: "manual"
            }).tooltip("show"), $("#slider-default").slider(), $("#slider-snap-inc").slider({
                value: 100,
                min: 0,
                max: 500,
                step: 50,
                slide: function(e, t) {
                    $("#slider-snap-inc-amount").text("$" + t.value)
                }
            }), $("#slider-snap-inc-amount").text("$" + $("#slider-snap-inc").slider("value")), $("#slider-range").slider({
                range: !0,
                min: 0,
                max: 500,
                values: [75, 300],
                slide: function(e, t) {
                    $("#slider-range-amount").text("$" + t.values[0] + " - $" + t.values[1])
                }
            }), $("#slider-range-amount").text("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1)), $("#slider-range-min").slider({
                range: "min",
                value: 37,
                min: 1,
                max: 700,
                slide: function(e, t) {
                    $("#slider-range-min-amount").text("$" + t.value)
                }
            }), $("#slider-range-min-amount").text("$" + $("#slider-range-min").slider("value")), $("#slider-range-max").slider({
                range: "max",
                min: 1,
                max: 700,
                value: 300,
                slide: function(e, t) {
                    $("#slider-range-max-amount").text("$" + t.value)
                }
            }), $("#slider-range-max-amount").text("$" + $("#slider-range-max").slider("value")), $("#slider-vertical-multiple > span").each(function() {
                var e = parseInt($(this).text(), 10);
                $(this).empty().slider({
                    value: e,
                    range: "min",
                    animate: !0,
                    orientation: "vertical"
                })
            }), $("#slider-vertical-range-min").slider({
                range: "min",
                value: 500,
                min: 1,
                max: 700,
                orientation: "vertical",
                slide: function(e, t) {
                    $("#slider-vertical-range-min-amount").text("$" + t.value)
                }
            }), $("#slider-vertical-range-min-amount").text("$" + $("#slider-vertical-range-min").slider("value"))
        }, L = function() {
            $(".simple_progress").progressbar({
                value: 89
            }), $(".progress_animate").progressbar({
                value: 1,
                create: function() {
                    $(".progress_animate .ui-progressbar-value").animate({
                        width: "100%"
                    }, {
                        duration: 1e4,
                        step: function(e) {
                            $(".progressAnimateValue").html(parseInt(e) + "%")
                        },
                        easing: "linear"
                    })
                }
            }), $(".progress_upload_animate").progressbar({
                value: 1,
                create: function() {
                    $(".progress_upload_animate .ui-progressbar-value").animate({
                        width: "100%"
                    }, {
                        duration: 2e4,
                        easing: "linear",
                        step: function(e) {
                            $(".progressUploadAnimateValue").html(parseInt(40.96 * e) + " Gb")
                        },
                        complete: function() {
                            $(".progress_upload_animate + .field_notice").html("<span class='must'>Upload Finished</span>")
                        }
                    })
                }
            }), $(".progressBarValue") && $(".progressBarValue").each(function() {
                var e = $(this).find(".progressCustomValueVal").html(),
                    t = parseInt(e);
                $(this).find(".progressCustomValue").progressbar({
                    value: 1,
                    create: function() {
                        $(this).find(".ui-progressbar-value").animate({
                            width: t + "%"
                        }, {
                            duration: 5e3,
                            step: function(e) {
                                $(this).parent().parent().parent().find(".progressCustomValueVal").html(parseInt(e) + "%")
                            },
                            easing: "linear"
                        })
                    }
                })
            })
        }, O = function() {
            $(".knob").knob({
                change: function() {},
                release: function(e) {
                    console.log("release : " + e)
                },
                cancel: function() {
                    console.log("cancel : ", this)
                },
                draw: function() {
                    if ("tron" == this.$.data("skin")) {
                        var e, t = this.angle(this.cv),
                            i = this.startAngle,
                            n = this.startAngle,
                            o = n + t,
                            a = 1;
                        return this.g.lineWidth = this.lineWidth, this.o.cursor && (n = o - .3) && (o += .3), this.o.displayPrevious && (e = this.startAngle + this.angle(this.v), this.o.cursor && (i = e - .3) && (e += .3), this.g.beginPath(), this.g.strokeStyle = this.pColor, this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, i, e, !1), this.g.stroke()), this.g.beginPath(), this.g.strokeStyle = a ? this.o.fgColor : this.fgColor, this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, n, o, !1), this.g.stroke(), this.g.lineWidth = 2, this.g.beginPath(), this.g.strokeStyle = this.o.fgColor, this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + 2 * this.lineWidth / 3, 0, 2 * Math.PI, !1), this.g.stroke(), !1
                    }
                }
            })
        }, z = function() {
            var e = function(e) {
                $(e).each(function() {
                    var e = $($($(this).attr("href"))),
                        t = $(this).parent().parent();
                    t.height() > e.height() && e.css("min-height", t.height())
                })
            };
            if ($("body").on("click", '.nav.nav-tabs.tabs-left a[data-toggle="tab"], .nav.nav-tabs.tabs-right a[data-toggle="tab"]', function() {
                e($(this))
            }), e('.nav.nav-tabs.tabs-left > li.active > a[data-toggle="tab"], .nav.nav-tabs.tabs-right > li.active > a[data-toggle="tab"]'), location.hash) {
                var t = location.hash.substr(1);
                $('a[href="#' + t + '"]').click()
            }
        }, H = function() {
            $("#tree1").admin_tree({
                dataSource: treeDataSource,
                multiSelect: !0,
                loadingHTML: '<div class="tree-loading"><i class="fa fa-spinner fa-2x fa-spin"></i></div>',
                "open-icon": "fa-minus",
                "close-icon": "fa-plus",
                selectable: !0,
                "selected-icon": "fa-check",
                "unselected-icon": "fa-times"
            }), $("#tree2").admin_tree({
                dataSource: treeDataSource2,
                loadingHTML: '<div class="tree-loading"><i class="fa fa-spinner fa-2x fa-spin"></i></div>',
                "open-icon": "fa-folder-open",
                "close-icon": "fa-folder",
                selectable: !1,
                "selected-icon": null,
                "unselected-icon": null
            }), $(".tree").find('[class*="fa-"]').addClass("fa")
        }, D = function() {
            var e = function(e) {
                var t = e.length ? e : $(e.target),
                    i = t.data("output");
                window.JSON ? i.val(window.JSON.stringify(t.nestable("serialize"))) : i.val("JSON browser support required for this demo.")
            };
            $("#nestable").nestable({
                group: 1
            }).on("change", e), $("#nestable2").nestable({
                group: 1
            }).on("change", e), e($("#nestable").data("output", $("#nestable-output"))), e($("#nestable2").data("output", $("#nestable2-output"))), $("#nestable-menu").on("click", function(e) {
                var t = $(e.target),
                    i = t.data("action");
                "expand-all" === i && $(".dd").nestable("expandAll"), "collapse-all" === i && $(".dd").nestable("collapseAll")
            }), $("#nestable3").nestable()
        }, X = function() {
            $("#example-dark").tablecloth({
                theme: "dark"
            }), $("#example-paper").tablecloth({
                theme: "paper",
                striped: !0
            }), $("#example-stats").tablecloth({
                theme: "stats",
                sortable: !0,
                condensed: !0,
                striped: !0,
                clean: !0
            })
        }, R = function() {
            $("#datatable1").dataTable({
                sPaginationType: "bs_full"
            }), $("#datatable2").dataTable({
                sPaginationType: "bs_full",
                sDom: "<'row'<'dataTables_header clearfix'<'col-md-4'l><'col-md-8'Tf>r>>t<'row'<'dataTables_footer clearfix'<'col-md-6'i><'col-md-6'p>>>",
                oTableTools: {
                    aButtons: ["copy", "print", "csv", "xls", "pdf"],
                    sSwfPath: "js/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
            }), $(".datatable").each(function() {
                var e = $(this),
                    t = e.closest(".dataTables_wrapper").find("div[id$=_filter] input");
                t.attr("placeholder", "Search"), t.addClass("form-control input-sm");
                var i = e.closest(".dataTables_wrapper").find("div[id$=_length] select");
                i.addClass("form-control input-sm")
            })
        }, F = function() {
            var e = [{
                id: "1",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "2",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "3",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "4",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "5",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "6",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "7",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "8",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "9",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "10",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "11",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "12",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "13",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "14",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "15",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "16",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "17",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "18",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "19",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "20",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "21",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "22",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "23",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "24",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }, {
                id: "25",
                invdate: "2007-12-03",
                name: "Client1",
                amount: "1000.00",
                tax: "140.00",
                total: "1000.00",
                note: "This is a note"
            }];
            jQuery("#rowed3").jqGrid({
                data: e,
                datatype: "local",
                height: 250,
                colNames: ["Inv No", "Date", "Client", "Amount", "Tax", "Total", "Notes"],
                colModel: [{
                    name: "id",
                    index: "id",
                    width: 55
                }, {
                    name: "invdate",
                    index: "invdate",
                    width: 90,
                    editable: !0
                }, {
                    name: "name",
                    index: "name",
                    width: 100,
                    editable: !0
                }, {
                    name: "amount",
                    index: "amount",
                    width: 80,
                    align: "right",
                    editable: !0
                }, {
                    name: "tax",
                    index: "tax",
                    width: 80,
                    align: "right",
                    editable: !0
                }, {
                    name: "total",
                    index: "total",
                    width: 80,
                    align: "right",
                    editable: !0
                }, {
                    name: "note",
                    index: "note",
                    width: 150,
                    sortable: !1,
                    editable: !0
                }],
                rowNum: 10,
                rowList: [10, 20, 30],
                pager: "#prowed3",
                sortname: "id",
                viewrecords: !0,
                sortorder: "asc",
                editurl: "server.html",
                caption: "Inline navigator",
                autowidth: !0
            }), jQuery("#rowed3").jqGrid("navGrid", "#prowed3", {
                edit: !1,
                add: !1,
                del: !1
            }), jQuery("#rowed3").jqGrid("inlineNav", "#prowed3"), $(".navtable .ui-pg-button").tooltip({
                container: "body"
            })
        }, U = function() {
            $("#autocomplete-example").typeahead({
                name: "countries",
                local: ["red", "blue", "green", "yellow", "brown", "black"]
            })
        }, q = function() {
            $("textarea.autosize").autosize(), $("textarea.autosize").addClass("textarea-transition")
        }, N = function() {
            $(".countable").simplyCountable()
        }, W = function() {
            $(".select2-01").select2({
                allowClear: !0
            }), $(".select2-02").select2({
                minimumInputLength: 3
            }), $(".select2-03").select2({
                tags: ["Sport", "Gadget", "Politics"]
            })
        }, Q = function() {
            $(".uniform").uniform()
        }, V = function() {
            $("select, input[type='checkbox']").uniform()
        }, G = function() {
            function e() {
                var e = ["Serif", "Sans", "Arial", "Arial Black", "Courier", "Courier New", "Comic Sans MS", "Helvetica", "Impact", "Lucida Grande", "Lucida Sans", "Tahoma", "Times", "Times New Roman", "Verdana"],
                    t = $("[title=Font]").siblings(".dropdown-menu");
                if ($.each(e, function(e, i) {
                    t.append($('<li><a data-edit="fontName ' + i + '" style="font-family:\'' + i + "'\">" + i + "</a></li>"))
                }), $("a[title]").tooltip({
                    container: "body"
                }), $(".dropdown-menu input").click(function() {
                    return !1
                }).change(function() {
                    $(this).parent(".dropdown-menu").siblings(".dropdown-toggle").dropdown("toggle")
                }).keydown("esc", function() {
                    this.value = "", $(this).change()
                }), $("[data-role=magic-overlay]").each(function() {
                    var e = $(this),
                        t = $(e.data("target"));
                    e.css("opacity", 0).css("position", "absolute").offset(t.offset()).width(t.outerWidth()).height(t.outerHeight())
                }), "onwebkitspeechchange" in document.createElement("input")) {
                    var i = $("#editor").offset();
                    $("#voiceBtn").css("position", "absolute").offset({
                        top: i.top,
                        left: i.left + $("#editor").innerWidth() - 35
                    })
                } else $("#voiceBtn").hide()
            }

            function t(e, t) {
                var i = "";
                "unsupported-file-type" === e ? i = "Unsupported format " + t : console.log("error uploading file", e, t), $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>File upload error</strong> ' + i + " </div>").prependTo("#alerts")
            }
            e(), $("#editor").wysiwyg({
                fileUploadError: t
            })
        }, J = function() {
            try {
                $(".dropzone").dropzone({
                    paramName: "file",
                    maxFilesize: .5,
                    addRemoveLinks: !0,
                    dictResponseError: "Error while uploading file!",
                    previewTemplate: '<div class="dz-preview dz-file-preview">\n  <div class="dz-details">\n    <div class="dz-filename"><span data-dz-name></span></div>\n    <div class="dz-size" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class="progress progress-sm progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div>\n  <div class="dz-success-mark"><span></span></div>\n  <div class="dz-error-mark"><span></span></div>\n  <div class="dz-error-message"><span data-dz-errormessage></span></div>\n</div>'
                })
            } catch (e) {
                alert("Dropzone.js does not support older browsers!")
            }
        }, Y = function() {
            function e() {
                function e(e) {
                    var t = n[e];
                    return r.setData(t), l.classed("toggled", function() {
                        return d3.select(this).attr("data-type") === t.type
                    }), t
                }

                function t() {
                    a += 1, a = a >= o.length ? 0 : a, e(o[a]), i = setTimeout(t, c)
                }
                var i, n = [{
                        xScale: "ordinal",
                        comp: [],
                        main: [{
                            className: ".main.l1",
                            data: [{
                                y: 15,
                                x: "2012-11-19T00:00:00"
                            }, {
                                y: 11,
                                x: "2012-11-20T00:00:00"
                            }, {
                                y: 8,
                                x: "2012-11-21T00:00:00"
                            }, {
                                y: 10,
                                x: "2012-11-22T00:00:00"
                            }, {
                                y: 1,
                                x: "2012-11-23T00:00:00"
                            }, {
                                y: 6,
                                x: "2012-11-24T00:00:00"
                            }, {
                                y: 8,
                                x: "2012-11-25T00:00:00"
                            }]
                        }, {
                            className: ".main.l2",
                            data: [{
                                y: 29,
                                x: "2012-11-19T00:00:00"
                            }, {
                                y: 33,
                                x: "2012-11-20T00:00:00"
                            }, {
                                y: 13,
                                x: "2012-11-21T00:00:00"
                            }, {
                                y: 16,
                                x: "2012-11-22T00:00:00"
                            }, {
                                y: 7,
                                x: "2012-11-23T00:00:00"
                            }, {
                                y: 18,
                                x: "2012-11-24T00:00:00"
                            }, {
                                y: 8,
                                x: "2012-11-25T00:00:00"
                            }]
                        }],
                        type: "line-dotted",
                        yScale: "linear"
                    }, {
                        xScale: "ordinal",
                        comp: [],
                        main: [{
                            className: ".main.l1",
                            data: [{
                                y: 12,
                                x: "2012-11-19T00:00:00"
                            }, {
                                y: 18,
                                x: "2012-11-20T00:00:00"
                            }, {
                                y: 8,
                                x: "2012-11-21T00:00:00"
                            }, {
                                y: 7,
                                x: "2012-11-22T00:00:00"
                            }, {
                                y: 6,
                                x: "2012-11-23T00:00:00"
                            }, {
                                y: 12,
                                x: "2012-11-24T00:00:00"
                            }, {
                                y: 8,
                                x: "2012-11-25T00:00:00"
                            }]
                        }, {
                            className: ".main.l2",
                            data: [{
                                y: 29,
                                x: "2012-11-19T00:00:00"
                            }, {
                                y: 33,
                                x: "2012-11-20T00:00:00"
                            }, {
                                y: 13,
                                x: "2012-11-21T00:00:00"
                            }, {
                                y: 16,
                                x: "2012-11-22T00:00:00"
                            }, {
                                y: 7,
                                x: "2012-11-23T00:00:00"
                            }, {
                                y: 18,
                                x: "2012-11-24T00:00:00"
                            }, {
                                y: 8,
                                x: "2012-11-25T00:00:00"
                            }]
                        }],
                        type: "cumulative",
                        yScale: "linear"
                    }, {
                        xScale: "ordinal",
                        comp: [],
                        main: [{
                            className: ".main.l1",
                            data: [{
                                y: 12,
                                x: "2012-11-19T00:00:00"
                            }, {
                                y: 18,
                                x: "2012-11-20T00:00:00"
                            }, {
                                y: 8,
                                x: "2012-11-21T00:00:00"
                            }, {
                                y: 7,
                                x: "2012-11-22T00:00:00"
                            }, {
                                y: 6,
                                x: "2012-11-23T00:00:00"
                            }, {
                                y: 12,
                                x: "2012-11-24T00:00:00"
                            }, {
                                y: 8,
                                x: "2012-11-25T00:00:00"
                            }]
                        }, {
                            className: ".main.l2",
                            data: [{
                                y: 29,
                                x: "2012-11-19T00:00:00"
                            }, {
                                y: 33,
                                x: "2012-11-20T00:00:00"
                            }, {
                                y: 13,
                                x: "2012-11-21T00:00:00"
                            }, {
                                y: 16,
                                x: "2012-11-22T00:00:00"
                            }, {
                                y: 7,
                                x: "2012-11-23T00:00:00"
                            }, {
                                y: 18,
                                x: "2012-11-24T00:00:00"
                            }, {
                                y: 8,
                                x: "2012-11-25T00:00:00"
                            }]
                        }],
                        type: "bar",
                        yScale: "linear"
                    }],
                    o = [0, 1, 0, 2],
                    a = 0,
                    s = d3.time.format("%A"),
                    r = new xChart("line-dotted", n[o[a]], "#chart1", {
                        axisPaddingTop: 5,
                        dataFormatX: function(e) {
                            return new Date(e)
                        },
                        tickFormatX: function(e) {
                            return s(e)
                        },
                        timing: 1250
                    }),
                    l = d3.selectAll(".multi button"),
                    c = 3500;
                l.on("click", function(t, n) {
                    clearTimeout(i), e(n)
                }), i = setTimeout(t, c)
            }

            function t() {
                var e = {
                    xScale: "time",
                    yScale: "linear",
                    type: "line",
                    main: [{
                        className: ".pizza",
                        data: [{
                            x: "2012-11-05",
                            y: 1
                        }, {
                            x: "2012-11-06",
                            y: 6
                        }, {
                            x: "2012-11-07",
                            y: 13
                        }, {
                            x: "2012-11-08",
                            y: -3
                        }, {
                            x: "2012-11-09",
                            y: -4
                        }, {
                            x: "2012-11-10",
                            y: 9
                        }, {
                            x: "2012-11-11",
                            y: 6
                        }]
                    }]
                }, t = {
                        dataFormatX: function(e) {
                            return d3.time.format("%Y-%m-%d").parse(e)
                        },
                        tickFormatX: function(e) {
                            return d3.time.format("%A")(e)
                        }
                    };
                new xChart("line", e, "#chart2", t)
            }

            function i() {
                var e = document.createElement("div"),
                    t = -(~~$("html").css("padding-left").replace("px", "") + ~~$("body").css("margin-left").replace("px", "")),
                    i = -32;
                e.className = "ex-tooltip", document.body.appendChild(e);
                var n = {
                    xScale: "time",
                    yScale: "linear",
                    main: [{
                        className: ".pizza",
                        data: [{
                            x: "2012-11-05",
                            y: 6
                        }, {
                            x: "2012-11-06",
                            y: 6
                        }, {
                            x: "2012-11-07",
                            y: 8
                        }, {
                            x: "2012-11-08",
                            y: 3
                        }, {
                            x: "2012-11-09",
                            y: 4
                        }, {
                            x: "2012-11-10",
                            y: 9
                        }, {
                            x: "2012-11-11",
                            y: 6
                        }]
                    }]
                }, o = {
                        dataFormatX: function(e) {
                            return d3.time.format("%Y-%m-%d").parse(e)
                        },
                        tickFormatX: function(e) {
                            return d3.time.format("%A")(e)
                        },
                        mouseover: function(n) {
                            var o = $(this).offset();
                            $(e).text(d3.time.format("%A")(n.x) + ": " + n.y).css({
                                top: i + o.top,
                                left: o.left + t
                            }).show()
                        },
                        mouseout: function() {
                            $(e).hide()
                        }
                    };
                new xChart("line-dotted", n, "#chart3", o)
            }

            function n() {
                var e = {
                    xScale: "ordinal",
                    yScale: "linear",
                    main: [{
                        className: ".pizza",
                        data: [{
                            x: "Pepperoni",
                            y: 4
                        }, {
                            x: "Cheese",
                            y: 8
                        }]
                    }]
                };
                new xChart("bar", e, "#chart4")
            }

            function o() {
                var e = {
                    xScale: "ordinal",
                    yScale: "linear",
                    main: [{
                        className: ".pizza",
                        data: [{
                            x: "Pepperoni",
                            y: 4
                        }, {
                            x: "Cheese",
                            y: 8
                        }]
                    }, {
                        className: ".pizza",
                        data: [{
                            x: "Pepperoni",
                            y: 6
                        }, {
                            x: "Cheese",
                            y: 5
                        }]
                    }]
                };
                new xChart("bar", e, "#chart5")
            }

            function a() {
                function e() {
                    setTimeout(function() {
                        e(), o += 1, n.setData(i[o % 2])
                    }, 3e3)
                }
                var t = {
                    enter: function(e, t, i, n) {
                        var o, a, s = xChart.visutils.getInsertionPoint(9),
                            r = n.map(function(e) {
                                return e.data = e.data.map(function(e) {
                                    return [{
                                        x: e.x,
                                        y: e.y - e.e
                                    }, {
                                        x: e.x,
                                        y: e.y
                                    }, {
                                        x: e.x,
                                        y: e.y + e.e
                                    }]
                                }), e
                            });
                        o = e._g.selectAll(".errorLine" + i).data(r, function(e) {
                            return e.className
                        }), o.enter().insert("g", s).attr("class", function(e, t) {
                            return "errorLine" + i.replace(/\./g, " ") + " color" + t
                        }), a = o.selectAll("path").data(function(e) {
                            return e.data
                        }, function(e) {
                            return e[0].x
                        }), a.enter().insert("path").style("opacity", 0).attr("d", d3.svg.line().x(function(t) {
                            return e.xScale(t.x) + e.xScale.rangeBand() / 2
                        }).y(function(t) {
                            return e.yScale(t.y)
                        })), t.containers = o, t.paths = a
                    },
                    update: function(e, t, i) {
                        t.paths.transition().duration(i).style("opacity", 1).attr("d", d3.svg.line().x(function(t) {
                            return e.xScale(t.x) + e.xScale.rangeBand() / 2
                        }).y(function(t) {
                            return e.yScale(t.y)
                        }))
                    },
                    exit: function(e, t, i) {
                        t.paths.exit().transition().duration(i).style("opacity", 0)
                    },
                    destroy: function(e, t, i) {
                        t.paths.transition().duration(i).style("opacity", 0).remove()
                    }
                };
                xChart.setVis("error", t);
                var i = [{
                    xScale: "ordinal",
                    yScale: "linear",
                    main: [{
                        className: ".errorExample",
                        data: [{
                            x: "Ponies",
                            y: 12
                        }, {
                            x: "Unicorns",
                            y: 23
                        }, {
                            x: "Trolls",
                            y: 1
                        }]
                    }],
                    comp: [{
                        type: "error",
                        className: ".comp.errorBar",
                        data: [{
                            x: "Ponies",
                            y: 12,
                            e: 5
                        }, {
                            x: "Unicorns",
                            y: 23,
                            e: 2
                        }, {
                            x: "Trolls",
                            y: 1,
                            e: 1
                        }]
                    }]
                }, {
                    xScale: "ordinal",
                    yScale: "linear",
                    main: [{
                        className: ".errorExample",
                        data: [{
                            x: "Ponies",
                            y: 76
                        }, {
                            x: "Unicorns",
                            y: 45
                        }, {
                            x: "Trolls",
                            y: 82
                        }]
                    }],
                    comp: [{
                        type: "error",
                        className: ".comp.errorBar",
                        data: [{
                            x: "Ponies",
                            y: 76,
                            e: 12
                        }, {
                            x: "Unicorns",
                            y: 45,
                            e: 3
                        }, {
                            x: "Trolls",
                            y: 82,
                            e: 12
                        }]
                    }]
                }],
                    n = new xChart("bar", i[0], "#chart6"),
                    o = 0;
                e()
            }
            e(), t(), i(), n(), o(), a()
        }, Z = function() {
            window.onload = function() {
                var e = new JustGage({
                    id: "g1",
                    value: getRandomInt(0, 100),
                    min: 0,
                    max: 100,
                    title: "Custom Width",
                    label: "",
                    gaugeWidthScale: .2
                }),
                    t = new JustGage({
                        id: "g2",
                        value: getRandomInt(0, 100),
                        min: 0,
                        max: 100,
                        title: "Custom Shadow",
                        label: "",
                        shadowOpacity: 1,
                        shadowSize: 0,
                        shadowVerticalOffset: 4
                    }),
                    i = new JustGage({
                        id: "g3",
                        value: getRandomInt(0, 100),
                        min: 0,
                        max: 100,
                        title: "Custom Colors",
                        label: "",
                        levelColors: [Theme.colors.red, Theme.colors.yellow, Theme.colors.green]
                    }),
                    n = new JustGage({
                        id: "g4",
                        value: getRandomInt(0, 100),
                        min: 0,
                        max: 100,
                        title: "Hide Labels",
                        showMinMax: !1
                    }),
                    o = new JustGage({
                        id: "g5",
                        value: getRandomInt(0, 100),
                        min: 0,
                        max: 100,
                        title: "Animation Type",
                        label: "",
                        startAnimationTime: 2e3,
                        startAnimationType: ">",
                        refreshAnimationTime: 1e3,
                        refreshAnimationType: "bounce"
                    }),
                    a = new JustGage({
                        id: "g6",
                        value: getRandomInt(0, 100),
                        min: 0,
                        max: 100,
                        title: "Minimal",
                        label: "",
                        showMinMax: !1,
                        gaugeColor: "#E6E6E6",
                        levelColors: ["#555555"],
                        showInnerShadow: !1,
                        startAnimationTime: 1,
                        startAnimationType: "linear",
                        refreshAnimationTime: 1,
                        refreshAnimationType: "linear"
                    });
                setInterval(function() {
                    e.refresh(getRandomInt(0, 100)), t.refresh(getRandomInt(0, 100)), i.refresh(getRandomInt(0, 100)), n.refresh(getRandomInt(0, 100)), o.refresh(getRandomInt(0, 100)), a.refresh(getRandomInt(0, 100))
                }, 2500)
            }
        }, K = function() {
            $("#pie_1").easyPieChart({
                easing: "easeOutBounce",
                onStep: function(e, t, i) {
                    $(this.el).find(".percent").text(Math.round(i))
                },
                lineWidth: 3,
                barColor: "#94B86E"
            });
            var e = window.chart = $("#pie_1").data("easyPieChart");
            $("#js_update_1").on("click", function() {
                e.update(100 * Math.random())
            }), $("#pie_2").easyPieChart({
                easing: "easeOutBounce",
                onStep: function(e, t, i) {
                    $(this.el).find(".percent").text(Math.round(i))
                },
                lineWidth: 6,
                barColor: "#FFB848"
            });
            var t = window.chart = $("#pie_2").data("easyPieChart");
            $("#js_update_2").on("click", function() {
                t.update(100 * Math.random())
            }), $("#pie_3").easyPieChart({
                easing: "easeOutBounce",
                onStep: function(e, t, i) {
                    $(this.el).find(".percent").text(Math.round(i))
                },
                lineWidth: 9,
                barColor: "#E25856"
            });
            var i = window.chart = $("#pie_3").data("easyPieChart");
            $("#js_update_3").on("click", function() {
                i.update(100 * Math.random())
            }), $("#pie_4").easyPieChart({
                easing: "easeOutBounce",
                onStep: function(e, t, i) {
                    $(this.el).find(".percent").text(Math.round(i))
                },
                lineWidth: 12,
                barColor: "#6DADBD",
                lineCap: "butt"
            });
            var n = window.chart = $("#pie_4").data("easyPieChart");
            $("#js_update_4").on("click", function() {
                n.update(100 * Math.random())
            })
        }, et = function() {
            $("#pie_1").easyPieChart({
                easing: "easeOutBounce",
                onStep: function(e, t, i) {
                    $(this.el).find(".percent").text(Math.round(i) + "%")
                },
                lineWidth: 6,
                barColor: "#FFB848"
            }), window.chart = $("#pie_1").data("easyPieChart"), $("#pie_2").easyPieChart({
                easing: "easeOutBounce",
                onStep: function(e, t, i) {
                    $(this.el).find(".percent").text(Math.round(i) + "%")
                },
                lineWidth: 6,
                barColor: "#E25856"
            }), window.chart = $("#pie_2").data("easyPieChart"), $("#pie_3").easyPieChart({
                easing: "easeOutBounce",
                onStep: function(e, t, i) {
                    $(this.el).find(".percent").text(Math.round(i) + "%")
                },
                lineWidth: 6,
                barColor: "#6DADBD"
            }), window.chart = $("#pie_3").data("easyPieChart")
        }, tt = function() {
            $(".sparkline").each(function() {
                var e, t, i, n;
                return i = $(this).attr("data-color") || "red", n = "18px", $(this).hasClass("big") && (t = "5px", e = "2px", n = "40px"), $(this).sparkline("html", {
                    type: "bar",
                    barColor: Theme.colors[i],
                    height: n,
                    barWidth: t,
                    barSpacing: e,
                    zeroAxis: !1
                })
            }), $(".sparklinepie").each(function() {
                var e;
                return e = "18px", $(this).hasClass("big") && (e = "40px"), $(this).sparkline("html", {
                    type: "pie",
                    height: e,
                    sliceColors: [Theme.colors.blue, Theme.colors.red, Theme.colors.green, Theme.colors.orange]
                })
            }), $(".linechart").each(function() {
                var e;
                return e = "18px", $(this).hasClass("big") && (e = "30px"), $(this).sparkline("html", {
                    type: "line",
                    height: e,
                    width: "100px",
                    minSpotColor: Theme.colors.red,
                    maxSpotColor: Theme.colors.green,
                    spotRadius: 2,
                    lineColor: Theme.colors.blue,
                    fillColor: Theme.colors.lightBlue
                })
            })
        }, it = function() {
            var e = function(e) {
                var t = {
                    title: $.trim(e.text())
                };
                e.data("eventObject", t), e.draggable({
                    zIndex: 999,
                    revert: !0,
                    revertDuration: 0
                })
            }, t = function(t) {
                    t = 0 == t.length ? "Untitled Event" : t;
                    var i = $('<div class="external-event">' + t + "</div>");
                    jQuery("#event-box").append(i), e(i)
                };
            $("#external-events div.external-event").each(function() {
                e($(this))
            }), $("#add-event").unbind("click").click(function() {
                var e = $("#event-title").val();
                t(e)
            });
            var i = new Date,
                n = i.getDate(),
                o = i.getMonth(),
                a = i.getFullYear(),
                s = $("#calendar").fullCalendar({
                    header: {
                        left: "prev,next today",
                        center: "title",
                        right: "month,agendaWeek,agendaDay"
                    },
                    selectable: !0,
                    selectHelper: !0,
                    select: function(e, t, i) {
                        var n = prompt("Event Title:");
                        n && s.fullCalendar("renderEvent", {
                            title: n,
                            start: e,
                            end: t,
                            allDay: i
                        }, !0), s.fullCalendar("unselect")
                    },
                    editable: !0,
                    editable: !0,
                    droppable: !0,
                    drop: function(e, t) {
                        var i = $(this).data("eventObject"),
                            n = $.extend({}, i);
                        n.start = e, n.allDay = t, $("#calendar").fullCalendar("renderEvent", n, !0), $("#drop-remove").is(":checked") && $(this).remove()
                    },
                    events: [{
                        title: "All Day Event",
                        start: new Date(a, o, 1),
                        backgroundColor: Theme.colors.blue
                    }, {
                        title: "Long Event",
                        start: new Date(a, o, n - 5),
                        end: new Date(a, o, n - 2),
                        backgroundColor: Theme.colors.red
                    }, {
                        id: 999,
                        title: "Repeating Event",
                        start: new Date(a, o, n - 3, 16, 0),
                        allDay: !1,
                        backgroundColor: Theme.colors.yellow
                    }, {
                        id: 999,
                        title: "Repeating Event",
                        start: new Date(a, o, n + 4, 16, 0),
                        allDay: !1,
                        backgroundColor: Theme.colors.primary
                    }, {
                        title: "Meeting",
                        start: new Date(a, o, n, 10, 30),
                        allDay: !1,
                        backgroundColor: Theme.colors.green
                    }, {
                        title: "Lunch",
                        start: new Date(a, o, n, 12, 0),
                        end: new Date(a, o, n, 14, 0),
                        allDay: !1,
                        backgroundColor: Theme.colors.red
                    }, {
                        title: "Birthday Party",
                        start: new Date(a, o, n + 1, 19, 0),
                        end: new Date(a, o, n + 1, 22, 30),
                        allDay: !1,
                        backgroundColor: Theme.colors.gray
                    }, {
                        title: "Click for Google",
                        start: new Date(a, o, 28),
                        end: new Date(a, o, 29),
                        url: "http://google.com/",
                        backgroundColor: Theme.colors.green
                    }]
                })
        }, nt = function() {
            var e = function(e) {
                var t = {
                    map: "world_en",
                    backgroundColor: null,
                    borderColor: "#333333",
                    borderOpacity: .5,
                    borderWidth: 1,
                    color: Theme.colors.blue,
                    enableZoom: !0,
                    hoverColor: Theme.colors.yellow,
                    hoverOpacity: null,
                    values: sample_data,
                    normalizeFunction: "linear",
                    scaleColors: ["#b6da93", "#427d1a"],
                    selectedColor: "#c9dfaf",
                    selectedRegion: null,
                    showTooltip: !0,
                    onRegionOver: function(e, t) {
                        "ca" == t && e.preventDefault()
                    },
                    onRegionClick: function(e, t, i) {
                        var n = 'You clicked "' + i + '" which has the code: ' + t.toUpperCase();
                        alert(n)
                    }
                };
                t.map = e + "_en";
                var i = jQuery("#vmap_" + e);
                i && (i.width(i.parent().width()), i.vectorMap(t))
            };
            e("world"), e("usa"), e("europe"), e("russia"), e("germany"), App.addResponsiveFunction(function() {
                e("world"), e("usa"), e("europe"), e("russia"), e("germany")
            })
        }, ot = function() {
            function e() {
                var e = $(window).width();
                768 > e ? $("#filter-items .item").addClass("width-100") : $("#filter-items .item").removeClass("width-100")
            }
            var t = $("#filter-items");
            t.imagesLoaded(function() {
                t.isotope({}), $("#filter-controls a").click(function() {
                    var e = $(this).attr("data-filter");
                    return t.isotope({
                        filter: e
                    }), !1
                }), $("#e1").change(function() {
                    var e = $(this).find(":selected").val();
                    return t.isotope({
                        filter: e
                    }), !1
                })
            }), e(), jQuery(window).resize(function() {
                e()
            })
        }, at = function() {
            $(".filter-content").hover(function() {
                var e = $(this).children(".hover-content");
                e.removeClass("fadeOut").addClass("animated fadeIn").show()
            }, function() {
                var e = $(this).children(".hover-content");
                e.removeClass("fadeIn").addClass("fadeOut")
            })
        }, st = function() {
            function e() {
                t && clearTimeout(t), t = setTimeout(function() {
                    var e = 442,
                        t = .95;
                    jQuery("#cboxOverlay").is(":visible") && ($.colorbox.resize({
                        width: $(window).width() > e + 20 ? e : Math.round($(window).width() * t)
                    }), $(".cboxPhoto").css({
                        width: $("#cboxLoadedContent").innerWidth(),
                        height: "auto"
                    }), $("#cboxLoadedContent").height($(".cboxPhoto").height()), $.colorbox.resize())
                }, 300)
            }
            $(".colorbox-button").colorbox({
                rel: "colorbox-button",
                maxWidth: "95%",
                maxHeight: "95%"
            });
            var t;
            jQuery(window).resize(e), window.addEventListener("orientationchange", e, !1)
        }, rt = function() {
            $.backstretch(["img/login/1.jpg", "img/login/2.jpg", "img/login/3.jpg", "img/login/4.jpg"], {
                duration: 3e3,
                fade: 750
            })
        }, lt = function(e) {
            var t = function() {
                var t = $("." + e + " .chat-form input"),
                    i = t.val();
                if (0 != i.length) {
                    var n = moment().format("YYYY-MM-DD HH:mm:ss"),
                        o = "";
                    o += '<li class="animated fadeInLeft media">', o += '<a class="pull-right" href="#">', o += '<img class="media-object" alt="Generic placeholder image" src="img/chat/headshot2.jpg">', o += "</a>", o += '<div class="pull-right media-body chat-pop mod">', o += '<h4 class="media-heading">You <span class="pull-left"><abbr id="curr-time" class="timeago" title="' + n + '" >' + n + '</abbr> <i class="fa fa-clock-o"></i></span></h4>', o += i, o += "</div>", o += "</li>";
                    var a = $("." + e + " .chat-list");
                    a.append(o), jQuery("abbr.timeago").timeago(), t.val(""), $("." + e + " .scroller").slimScroll({
                        scrollTo: a.height()
                    })
                }
            };
            $("." + e + " .chat-form .btn").click(function(e) {
                e.preventDefault(), t()
            });
            var i = $("." + e + " .chat-form input");
            i.keypress(function(e) {
                return 13 == e.which ? (t(), !1) : void 0
            })
        }, ct = function() {
            createStoryJS({
                type: "timeline",
                width: "100%",
                height: "600",
                source: "js/timelinejs/example_json.json",
                embed_id: "my-timeline",
                debug: !0,
                css: "js/timelinejs/css/timeline.css",
                js: "js/timelinejs/js/timeline-min.js"
            })
        }, dt = function() {
            $("#address-book").sliderNav(), $("#address-book .slider-content ul li ul li a").click(function(e) {
                e.preventDefault();
                var t = $("#contact-card"),
                    i = $(this).text();
                $("#contact-card .panel-title").html(i), $("#contact-card #card-name").html(i);
                var n = Math.floor(5 * Math.random()) + 1;
                $("#contact-card .headshot img").attr("src", "img/addressbook/" + n + ".jpg"), t.removeClass("animated fadeInUp").addClass("animated fadeInUp"), window.setTimeout(function() {
                    t.removeClass("animated fadeInUp")
                }, 1300)
            })
        }, ut = function() {
            $("#list-toggle .list-group a").click(function() {
                $("#list-toggle .list-group > a.active").removeClass("active"), $(this).addClass("active")
            })
        }, ht = function() {
            $("#list-toggle .list-group li a").click(function() {
                $("#list-toggle .list-group > li a.active").removeClass("active"), $(this).addClass("active")
            })
        }, mt = function() {
            $(".box-container").sortable({
                connectWith: ".box-container",
                items: "> .box",
                opacity: .8,
                revert: !0,
                forceHelperSize: !0,
                placeholder: "box-placeholder",
                forcePlaceholderSize: !0,
                tolerance: "pointer"
            })
        }, pt = function() {
            $(".footer-tools").on("click", ".go-top", function(e) {
                App.scrollTo(), e.preventDefault()
            })
        }, ft = function() {
            i && o && $("#main-content").addClass("margin-top-100"), !i && o && $("#main-content").removeClass("margin-top-100").addClass("margin-top-52")
        }, gt = function() {
            function e() {
                function e(e, t, i) {
                    $('<div id="tooltip">' + i + "</div>").css({
                        position: "absolute",
                        display: "none",
                        top: t + 5,
                        left: e + 15,
                        border: "1px solid #333",
                        padding: "4px",
                        color: "#fff",
                        "border-radius": "3px",
                        "background-color": "#333",
                        opacity: .8
                    }).appendTo("body").fadeIn(200)
                }
                var t = [
                    [0, 1.5],
                    [1, 2],
                    [2, 1],
                    [3, 1.5],
                    [4, 2.5],
                    [5, 2],
                    [6, 2],
                    [7, .5],
                    [8, 1],
                    [9, 1.5],
                    [10, 2],
                    [11, 2.5],
                    [12, 2],
                    [13, 1.5],
                    [14, 2.8],
                    [15, 2],
                    [16, 3],
                    [17, 2],
                    [18, 2.5],
                    [19, 3],
                    [20, 2.5],
                    [21, 2],
                    [22, 1.5],
                    [23, 2.5],
                    [24, 2],
                    [25, 1.5],
                    [26, 1],
                    [27, .5],
                    [28, 1],
                    [29, 1],
                    [30, 1.5],
                    [31, 1]
                ],
                    i = [
                        [0, 2.5],
                        [1, 3.5],
                        [2, 2],
                        [3, 3],
                        [4, 4],
                        [5, 3.5],
                        [6, 3.5],
                        [7, 1],
                        [8, 2],
                        [9, 3],
                        [10, 4],
                        [11, 5],
                        [12, 4],
                        [13, 3],
                        [14, 5],
                        [15, 3.5],
                        [16, 5],
                        [17, 4],
                        [18, 5],
                        [19, 6],
                        [20, 5],
                        [21, 4],
                        [22, 3],
                        [23, 5],
                        [24, 4],
                        [25, 3],
                        [26, 2],
                        [27, 1],
                        [28, 2],
                        [29, 2],
                        [30, 3],
                        [31, 2]
                    ];
                $.plot($("#chart-dash"), [{
                    data: i,
                    label: "Pageviews",
                    bars: {
                        show: !0,
                        fill: !0,
                        barWidth: .4,
                        align: "center",
                        lineWidth: 13
                    }
                }, {
                    data: t,
                    label: "Visits",
                    lines: {
                        show: !0,
                        lineWidth: 2
                    },
                    points: {
                        show: !0,
                        lineWidth: 2,
                        fill: !0
                    },
                    shadowSize: 0
                }, {
                    data: t,
                    label: "Visits",
                    lines: {
                        show: !0,
                        lineWidth: 1,
                        fill: !0,
                        fillColor: {
                            colors: [{
                                opacity: .05
                            }, {
                                opacity: .01
                            }]
                        }
                    },
                    points: {
                        show: !0,
                        lineWidth: .5,
                        fill: !0
                    },
                    shadowSize: 0
                }], {
                    grid: {
                        hoverable: !0,
                        clickable: !0,
                        tickColor: "#f7f7f7",
                        borderWidth: 0,
                        labelMargin: 10,
                        margin: {
                            top: 0,
                            left: 5,
                            bottom: 0,
                            right: 0
                        }
                    },
                    legend: {
                        show: !1
                    },
                    colors: ["rgba(109,173,189,0.5)", "#6DADBD", "#DB5E8C"],
                    xaxis: {
                        ticks: 5,
                        tickDecimals: 0,
                        tickColor: "#fff"
                    },
                    yaxis: {
                        ticks: 3,
                        tickDecimals: 0
                    }
                });
                var n = null;
                $("#chart-dash").bind("plothover", function(t, i, o) {
                    if ($("#x").text(i.x.toFixed(2)), $("#y").text(i.y.toFixed(2)), o) {
                        if (n != o.dataIndex) {
                            n = o.dataIndex, $("#tooltip").remove();
                            var a = o.datapoint[0].toFixed(2),
                                s = o.datapoint[1].toFixed(2);
                            e(o.pageX, o.pageY, o.series.label + " of " + a + " = " + s)
                        }
                    } else $("#tooltip").remove(), n = null
                })
            }

            function t() {
                function e(e) {
                    var t = [],
                        i = new Date(e.xaxis.min);
                    i.setUTCDate(i.getUTCDate() - (i.getUTCDay() + 1) % 7), i.setUTCSeconds(0), i.setUTCMinutes(0), i.setUTCHours(0);
                    var n = i.getTime();
                    do t.push({
                        xaxis: {
                            from: n,
                            to: n + 1728e5
                        }
                    }), n += 6048e5; while (n < e.xaxis.max);
                    return t
                }
                for (var t = [
                    [11964636e5, 0],
                    [119655e7, 0],
                    [11966364e5, 0],
                    [11967228e5, 77],
                    [11968092e5, 3636],
                    [11968956e5, 3575],
                    [1196982e6, 2736],
                    [11970684e5, 1086],
                    [11971548e5, 676],
                    [11972412e5, 1205],
                    [11973276e5, 906],
                    [1197414e6, 710],
                    [11975004e5, 639],
                    [11975868e5, 540],
                    [11976732e5, 435],
                    [11977596e5, 301],
                    [1197846e6, 575],
                    [11979324e5, 481],
                    [11980188e5, 591],
                    [11981052e5, 608],
                    [11981916e5, 459],
                    [1198278e6, 234],
                    [11983644e5, 1352],
                    [11984508e5, 686],
                    [11985372e5, 279],
                    [11986236e5, 449],
                    [119871e7, 468],
                    [11987964e5, 392],
                    [11988828e5, 282],
                    [11989692e5, 208],
                    [11990556e5, 229],
                    [1199142e6, 177],
                    [11992284e5, 374],
                    [11993148e5, 436],
                    [11994012e5, 404],
                    [11994876e5, 253],
                    [1199574e6, 218],
                    [11996604e5, 476],
                    [11997468e5, 462],
                    [11998332e5, 448],
                    [11999196e5, 442],
                    [1200006e6, 403],
                    [12000924e5, 204],
                    [12001788e5, 194],
                    [12002652e5, 327],
                    [12003516e5, 374],
                    [1200438e6, 507],
                    [12005244e5, 546],
                    [12006108e5, 482],
                    [12006972e5, 283],
                    [12007836e5, 221],
                    [120087e7, 483],
                    [12009564e5, 523],
                    [12010428e5, 528],
                    [12011292e5, 483],
                    [12012156e5, 452],
                    [1201302e6, 270],
                    [12013884e5, 222],
                    [12014748e5, 439],
                    [12015612e5, 559],
                    [12016476e5, 521],
                    [1201734e6, 477],
                    [12018204e5, 442],
                    [12019068e5, 252],
                    [12019932e5, 236],
                    [12020796e5, 525],
                    [1202166e6, 477],
                    [12022524e5, 386],
                    [12023388e5, 409],
                    [12024252e5, 408],
                    [12025116e5, 237],
                    [1202598e6, 193],
                    [12026844e5, 357],
                    [12027708e5, 414],
                    [12028572e5, 393],
                    [12029436e5, 353],
                    [120303e7, 364],
                    [12031164e5, 215],
                    [12032028e5, 214],
                    [12032892e5, 356],
                    [12033756e5, 399],
                    [1203462e6, 334],
                    [12035484e5, 348],
                    [12036348e5, 243],
                    [12037212e5, 126],
                    [12038076e5, 157],
                    [1203894e6, 288]
                ], i = 0; i < t.length; ++i) t[i][0] += 36e5;
                var n = {
                    series: {
                        lines: {
                            show: !0,
                            lineWidth: 2,
                            fill: !0,
                            fillColor: {
                                colors: [{
                                    opacity: .05
                                }, {
                                    opacity: .01
                                }]
                            }
                        },
                        points: {
                            show: !0
                        },
                        shadowSize: 2
                    },
                    xaxis: {
                        mode: "time",
                        tickLength: 5
                    },
                    selection: {
                        mode: "x",
                        color: "#5E87B0"
                    },
                    colors: ["#5E87B0", "#37b7f3", "#52e136"],
                    grid: {
                        markings: e,
                        hoverable: !0,
                        clickable: !0,
                        tickColor: "#eee",
                        borderWidth: 0
                    }
                }, o = $.plot("#placeholder", [t], n),
                    a = $.plot("#overview", [t], {
                        series: {
                            lines: {
                                show: !0,
                                lineWidth: 1
                            },
                            shadowSize: 1
                        },
                        colors: ["#5E87B0", "#37b7f3", "#52e136"],
                        xaxis: {
                            mode: "time"
                        },
                        yaxis: {
                            ticks: [],
                            min: 0,
                            autoscaleMargin: .1
                        },
                        selection: {
                            mode: "x",
                            color: "#5E87B0"
                        },
                        grid: {
                            hoverable: !0,
                            clickable: !0,
                            tickColor: "#eee",
                            borderWidth: 0
                        }
                    });
                $("#placeholder").bind("plotselected", function(e, i) {
                    o = $.plot("#placeholder", [t], $.extend(!0, {}, n, {
                        xaxis: {
                            min: i.xaxis.from,
                            max: i.xaxis.to
                        }
                    })), a.setSelection(i, !0)
                }), $("#overview").bind("plotselected", function(e, t) {
                    o.setSelection(t)
                })
            }

            function i() {
                function e(e, t, i) {
                    $('<div id="tooltip">' + i + "</div>").css({
                        position: "absolute",
                        display: "none",
                        top: t + 5,
                        left: e + 5,
                        border: "1px solid #fdd",
                        padding: "2px",
                        "background-color": "#dfeffc",
                        opacity: .8
                    }).appendTo("body").fadeIn(200)
                }
                var t = [
                    [1, 100 * Math.random()],
                    [2, 100 * Math.random()],
                    [3, 100 * Math.random()],
                    [4, 100 * Math.random()],
                    [5, 100 * Math.random()],
                    [6, 100 * Math.random()],
                    [7, 100 * Math.random()],
                    [8, 100 * Math.random()],
                    [9, 100 * Math.random()],
                    [10, 100 * Math.random()],
                    [11, 100 * Math.random()],
                    [12, 100 * Math.random()]
                ],
                    i = $(this).parent().parent().css("color");
                $.plot($("#chart-revenue"), [{
                    data: t
                }], {
                    series: {
                        label: "Revenue",
                        lines: {
                            show: !0,
                            lineWidth: 3,
                            fill: !1
                        },
                        points: {
                            show: !0,
                            lineWidth: 3,
                            fill: !0,
                            fillColor: i
                        },
                        shadowSize: 0
                    },
                    grid: {
                        hoverable: !0,
                        clickable: !0,
                        tickColor: "rgba(255,255,255,.15)",
                        borderColor: "rgba(255,255,255,0)"
                    },
                    colors: ["#fff"],
                    xaxis: {
                        font: {
                            color: "#fff"
                        },
                        ticks: 6,
                        tickDecimals: 0,
                        tickColor: i
                    },
                    yaxis: {
                        font: {
                            color: "#fff"
                        },
                        ticks: 4,
                        tickDecimals: 0,
                        autoscaleMargin: 1e-6
                    },
                    legend: {
                        show: !1
                    }
                });
                var n = null;
                $("#chart-revenue").bind("plothover", function(t, i, o) {
                    if ($("#x").text(i.x.toFixed(2)), $("#y").text(i.y.toFixed(2)), o) {
                        if (n != o.dataIndex) {
                            n = o.dataIndex, $("#tooltip").remove();
                            var a = o.datapoint[0].toFixed(2),
                                s = o.datapoint[1].toFixed(2);
                            e(o.pageX, o.pageY, o.series.label + " on " + a + " = " + s)
                        }
                    } else $("#tooltip").remove(), n = null
                })
            }
            e(), t(), i(), $("#dash_pie_1").easyPieChart({
                easing: "easeOutBounce",
                onStep: function(e, t, i) {
                    $(this.el).find(".percent").text(Math.round(i) + "%")
                },
                lineWidth: 6,
                barColor: Theme.colors.purple
            });
            var n = window.chart = $("#dash_pie_1").data("easyPieChart");
            $("#dash_pie_2").easyPieChart({
                easing: "easeOutBounce",
                onStep: function(e, t, i) {
                    $(this.el).find(".percent").text(Math.round(i) + "%")
                },
                lineWidth: 6,
                barColor: Theme.colors.yellow
            });
            var o = window.chart = $("#dash_pie_2").data("easyPieChart");
            $("#dash_pie_3").easyPieChart({
                easing: "easeOutBounce",
                onStep: function(e, t, i) {
                    $(this.el).find(".percent").text(Math.round(i) + "%")
                },
                lineWidth: 6,
                barColor: Theme.colors.pink
            });
            var a = window.chart = $("#dash_pie_3").data("easyPieChart");
            $(".js_update").on("click", function() {
                n.update(100 * Math.random()), o.update(100 * Math.random()), a.update(100 * Math.random()), i()
            })
        }, vt = function() {
            var e = function(e) {
                $("#skin-switcher").attr("href", "css/themes/" + e + ".css"), $.cookie("skin_color", e)
            };
            $("ul.skins > li a").click(function() {
                var t = $(this).data("skin");
                e(t)
            }), $.cookie("skin_color") && e($.cookie("skin_color"))
        }, yt = function() {
            $.cookie("gritter_show") || ($.cookie("gritter_show", 1), setTimeout(function() {
                var e = $.gritter.add({
                    title: "Welcome to Cloud Admin!",
                    text: "Cloud is a feature-rich Responsive Admin Dashboard Template with a wide array of plugins!",
                    image: "img/gritter/cloud.png",
                    sticky: !0,
                    time: "",
                    class_name: "my-sticky-class"
                });
                setTimeout(function() {
                    $.gritter.remove(e, {
                        fade: !0,
                        speed: "slow"
                    })
                }, 12e3)
            }, 2e3), setTimeout(function() {
                var e = $.gritter.add({
                    title: "Customize Cloud Admin!",
                    text: "Cloud Admin is easily customizable, lightweight and has a great User Experience.",
                    image: "img/gritter/settings.png",
                    sticky: !0,
                    time: "",
                    class_name: "my-sticky-class"
                });
                setTimeout(function() {
                    $.gritter.remove(e, {
                        fade: !0,
                        speed: "slow"
                    })
                }, 13e3)
            }, 8e3), setTimeout(function() {
                $.extend($.gritter.options, {
                    position: "top-left"
                });
                var e = $.gritter.add({
                    position: "top-left",
                    title: "Buy Cloud Admin!",
                    text: "Purchase Cloud Admin theme and get access to future updates at no extra cost. Buy now!",
                    image: "img/gritter/buy.png",
                    sticky: !0,
                    time: "",
                    class_name: "my-sticky-class"
                });
                $.extend($.gritter.options, {
                    position: "top-right"
                }), setTimeout(function() {
                    $.gritter.remove(e, {
                        fade: !0,
                        speed: "slow"
                    })
                }, 15e3)
            }, 15e3), setTimeout(function() {
                $.extend($.gritter.options, {
                    position: "top-left"
                });
                var e = $.gritter.add({
                    title: "Notification",
                    text: "You have 6 new notifications.",
                    sticky: !0,
                    time: "",
                    class_name: "my-sticky-class"
                });
                setTimeout(function() {
                    $.gritter.remove(e, {
                        fade: !0,
                        speed: "slow"
                    })
                }, 4e3), $.extend($.gritter.options, {
                    position: "top-right"
                })
            }, 2e4), setTimeout(function() {
                $.extend($.gritter.options, {
                    position: "top-left"
                });
                var e = $.gritter.add({
                    title: "Inbox",
                    text: "You have 5 new messages in your inbox.",
                    sticky: !0,
                    time: "",
                    class_name: "my-sticky-class"
                });
                $.extend($.gritter.options, {
                    position: "top-right"
                }), setTimeout(function() {
                    $.gritter.remove(e, {
                        fade: !0,
                        speed: "slow"
                    })
                }, 4e3)
            }, 25e3))
        };
    return {
        init: function() {
            App.isPage("index") && (g(), tt(), gt(), lt("chat-window"), it(), yt()), App.isPage("widgets_box") && mt(), App.isPage("elements") && (x(), E(), A(), M(), T()), App.isPage("button_icons") && (S(), j()), App.isPage("sliders_progress") && (P(), L(), O()), App.isPage("treeview") && H(), App.isPage("nestable_lists") && D(), App.isPage("simple_table") && X(), App.isPage("dynamic_table") && R(), App.isPage("jqgrid_plugin") && F(), App.isPage("forms") && (U(), q(), N(), W(), Q(), T()), App.isPage("rich_text_editors") && G(), App.isPage("dropzone_file_upload") && J(), App.isPage("xcharts") && Y(), App.isPage("others") && (Z(), K(), tt()), App.isPage("calendar") && (it(), Q()), App.isPage("vector_maps") && nt(), App.isPage("gallery") && (ot(), at(), st()), App.isPage("login") && Q(), App.isPage("wizards_validations") && Q(), App.isPage("login_bg") && (Q(), rt()), App.isPage("chats") && (lt("chat-window"), lt("chat-widget"), B()), App.isPage("todo_timeline") && ct(), App.isPage("address_book") && dt(), App.isPage("orders") && B(), App.isPage("faq") && ut(), App.isPage("inbox") && ht(), App.isPage("user_profile") && et(), App.isPage("mini_sidebar") && u(), App.isPage("fixed_header_sidebar") && f(), l(), d(), m(), c(), h(), v(), _(), b(), w(), k(), I(), C(), z(), pt(), ft(), vt()
        },
        setPage: function(t) {
            e = t
        },
        isPage: function(t) {
            return e == t ? !0 : !1
        },
        addResponsiveFunction: function(e) {
            a.push(e)
        },
        scrollTo: function(e, t) {
            pos = e && e.size() > 0 ? e.offset().top : 0, jQuery("html,body").animate({
                scrollTop: pos + (t ? t : 0)
            }, "slow")
        },
        scrollTop: function() {
            App.scrollTo()
        },
        initUniform: function(e) {
            e ? jQuery(e).each(function() {
                0 == $(this).parents(".checker").size() && ($(this).show(), $(this).uniform())
            }) : V()
        },
        blockUI: function(e) {
            lastBlockedUI = e, jQuery(e).block({
                message: '<img src="./img/loaders/12.gif" align="absmiddle">',
                css: {
                    border: "none",
                    padding: "2px",
                    backgroundColor: "none"
                },
                overlayCSS: {
                    backgroundColor: "#000",
                    opacity: .05,
                    cursor: "wait"
                }
            })
        },
        getURLParameter: function(e) {
            var t, i, n = window.location.search.substring(1),
                o = n.split("&");
            for (t = 0; t < o.length; t++)
                if (i = o[t].split("="), i[0] == e) return unescape(i[1]);
            return null
        },
        unblockUI: function(e) {
            jQuery(e).unblock({
                onUnblock: function() {
                    jQuery(e).removeAttr("style")
                }
            })
        }
    }
}();
! function(e) {
    e.fn.admin_tree = function(t) {
        var i = {
            "open-icon": "fa fa-folder-open",
            "close-icon": "fa fa-folder",
            selectable: !0,
            "selected-icon": "fa fa-check",
            "unselected-icon": "tree-dot"
        };
        return i = e.extend({}, i, t), this.each(function() {
            var t = e(this);
            t.html('<div class = "tree-folder" style="display:none;">				<div class="tree-folder-header">					<i class="' + i["close-icon"] + '"></i>					<div class="tree-folder-name"></div>				</div>				<div class="tree-folder-content"></div>				<div class="tree-loader" style="display:none"></div>			</div>			<div class="tree-item" style="display:none;">				' + (null == i["unselected-icon"] ? "" : '<i class="' + i["unselected-icon"] + '"></i>') + '				<div class="tree-item-name"></div>			</div>'), t.addClass(1 == i.selectable ? "tree-selectable" : "tree-unselectable"), t.tree(i)
        }), this
    }
}(window.jQuery),
function() {
    this.Theme = function() {
        function e() {}
        return e.colors = {
            white: "#FFFFFF",
            primary: "#5E87B0",
            red: "#E25856",
            green: "#94B86E",
            blue: "#6DADBD",
            orange: "#FFB848",
            yellow: "#FCD76A",
            gray: "#6B787F",
            lightBlue: "#D4E5DE",
            purple: "#A696CE",
            pink: "#DB5E8C",
            dark_orange: "#F38630"
        }, e
    }()
}(window.jQuery);
