<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>IT</title>
    <!--META-->
    <meta name="viewport" content="width=device-width initial-scale=1.0">

    <!--FONT-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,400italic' rel='stylesheet' type='text/css'>
    <!--CSS-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/grid.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/tooltip-flip.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/design.css">
    
</head>
<body>


            <script src="<?php echo base_url();?>assets/js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
            <script type="text/javascript">
                jssor_1_slider_init = function() {

                    var jssor_1_SlideoTransitions = [

                        [{b:0,d:1000,y:185},{b:1000,d:500,o:-1},{b:1500,d:500,o:1},{b:2000,d:1500,r:360},{b:3500,d:1000,rX:30},{b:4500,d:500,rX:-30}],//end one div on the first slide,
                        [{b:0,d:900,x:535,e:{x:27}}],//end one div marketing
                        [{b:0,d:900,x:1000,e:{x:27}}],[{b:0,d:900,x:1000,e:{x:27}}],//end div 3
                        ,[{b:-1,d:1,o:-1},{b:0,d:900,o:1,e:{o:1}}],//end div fade in
                        [{b:-1,d:1,c:{x:250.0,t:-250.0}},{b:0,d:800,c:{x:-250.0,t:250.0},e:{c:{x:7,t:7}}}]
                    ];

                    var jssor_1_options = {
                        $AutoPlay: 1,
                        $Idle: 2000,
                        $CaptionSliderOptions: {
                            $Class: $JssorCaptionSlideo$,
                            $Transitions: jssor_1_SlideoTransitions,
                            $Breaks: [
                                [{d:2000,b:1000}]
                            ]
                        },
                        $ArrowNavigatorOptions: {
                            $Class: $JssorArrowNavigator$
                        },
                        $BulletNavigatorOptions: {
                            $Class: $JssorBulletNavigator$
                        }
                    };

                    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                    /*#region responsive code begin*/

                    var MAX_WIDTH = 2000;

                    function ScaleSlider() {
                        var containerElement = jssor_1_slider.$Elmt.parentNode;
                        var containerWidth = containerElement.clientWidth;

                        if (containerWidth) {

                            var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                            jssor_1_slider.$ScaleWidth(expectedWidth);
                        }
                        else {
                            window.setTimeout(ScaleSlider, 20);
                        }
                    }

                    ScaleSlider();

                    $Jssor$.$AddEvent(window, "load", ScaleSlider);
                    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                    /*#endregion responsive code end*/
                };

            </script>

