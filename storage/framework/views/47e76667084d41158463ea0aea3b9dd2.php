<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

   </head>
   <html lang="en" class="fontawesome-i2svg-active fontawesome-i2svg-complete"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
  }

  .sidenav {
    height: 100%;
    width: 250px; /* Default width for desktop */
    position: fixed;
    top: 0;
    left: 0;
    background-color: #006A67;
    color: white;
    padding-top: 20px;
    transition: width 0.3s;
    overflow-x: hidden;
  }

  .sidenav li {
    padding: 10px 20px;
    font-size: 18px;
    color: white;
    list-style: none;
    cursor: pointer;
    transition: background-color 0.2s;
  }

  .sidenav li:hover {
    background-color: rgb(90, 100, 98);
  }

  .sidenav .toggle-switch {
    display: flex;
    align-items: center;
    padding: 10px 20px;
  }

  .sidenav .toggle-switch input {
    margin-left: auto;
  }

  .main {
    margin-left: 20%; /* Align content next to sidebar */
    padding: 20px;
    transition: margin-left 0.3s;
  }

  .toggle-btn {
    position: absolute;
    top: 10px;
    left: 260px;
    font-size: 20px;
    cursor: pointer;
    color: black;
    transition: left 0.3s;
  }

  /* Collapsed sidebar */
  .collapsed {
    width: 0px;
  }

  .collapsed li {
    text-align: center;
    font-size: 14px;
    padding: 10px;
  }

  .collapsed .toggle-switch {
    justify-content: center;
  }

  .collapsed .toggle-switch span {
    display: none;
  }

  .collapsed + .main {
    margin-left: 60px;
  }

  .collapsed + .toggle-btn {
    left: 70px;
  }

  /* Responsive design for smaller screens */
  @media (max-width: 768px) {
    .sidenav {
      width: 20%; /* Collapsed by default */
    }

    .sidenav li {
      text-align: center;
      font-size: 14px;
    }

    .sidenav .toggle-switch span {
      display: none;
    }

    .main {
      margin-left: auto; /* Adjust content margin */
    }

    .toggle-btn {
      margin-left: 20px;
    }
  }

  @media (max-width: 480px) {
    .sidenav {
      position: fixed;
      overflow-x:visible;
      width: 139%; /* Full width for small screens */
      height: 100%; /* Adjust height */
      bottom: 0;
      top: auto;
      display: flex;
      flex-direction: row;
      justify-content: space-around;
      padding: 10px 0;
    }

    .sidenav li {
      font-size: 16px;
      padding: 5px 10px;
    }

    .main {
      /* margin: 20%; */
      margin: auto; 
    }
    .collapsed {
    width: 60px;
  }

  .collapsed li {
    text-align: center;
    font-size: 14px;
    padding: 10px;
  }

  .collapsed .toggle-switch {
    justify-content: center;
  }

  .collapsed .toggle-switch span {
    display: none;
  }

  .collapsed + .main {
    margin-left: 60px;
  }

  .collapsed + .toggle-btn {
    left: 1%;
  }

    .toggle-btn {
        margin-left: auto; /* Hide toggle button */
    }
  }
</style>
    <style type="text/css">:host,:root{--fa-font-solid:normal 900 1em/1 "Font Awesome 6 Solid";--fa-font-regular:normal 400 1em/1 "Font Awesome 6 Regular";--fa-font-light:normal 300 1em/1 "Font Awesome 6 Light";--fa-font-thin:normal 100 1em/1 "Font Awesome 6 Thin";--fa-font-duotone:normal 900 1em/1 "Font Awesome 6 Duotone";--fa-font-sharp-solid:normal 900 1em/1 "Font Awesome 6 Sharp";--fa-font-sharp-regular:normal 400 1em/1 "Font Awesome 6 Sharp";--fa-font-sharp-light:normal 300 1em/1 "Font Awesome 6 Sharp";--fa-font-sharp-thin:normal 100 1em/1 "Font Awesome 6 Sharp";--fa-font-brands:normal 400 1em/1 "Font Awesome 6 Brands"}svg:not(:host).svg-inline--fa,svg:not(:root).svg-inline--fa{overflow:visible;box-sizing:content-box}.svg-inline--fa{display:var(--fa-display,inline-block);height:1em;overflow:visible;vertical-align:-.125em}.svg-inline--fa.fa-2xs{vertical-align:.1em}.svg-inline--fa.fa-xs{vertical-align:0}.svg-inline--fa.fa-sm{vertical-align:-.0714285705em}.svg-inline--fa.fa-lg{vertical-align:-.2em}.svg-inline--fa.fa-xl{vertical-align:-.25em}.svg-inline--fa.fa-2xl{vertical-align:-.3125em}.svg-inline--fa.fa-pull-left{margin-right:var(--fa-pull-margin,.3em);width:auto}.svg-inline--fa.fa-pull-right{margin-left:var(--fa-pull-margin,.3em);width:auto}.svg-inline--fa.fa-li{width:var(--fa-li-width,2em);top:.25em}.svg-inline--fa.fa-fw{width:var(--fa-fw-width,1.25em)}.fa-layers svg.svg-inline--fa{bottom:0;left:0;margin:auto;position:absolute;right:0;top:0}.fa-layers-counter,.fa-layers-text{display:inline-block;position:absolute;text-align:center}.fa-layers{display:inline-block;height:1em;position:relative;text-align:center;vertical-align:-.125em;width:1em}.fa-layers svg.svg-inline--fa{-webkit-transform-origin:center center;transform-origin:center center}.fa-layers-text{left:50%;top:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);-webkit-transform-origin:center center;transform-origin:center center}.fa-layers-counter{background-color:var(--fa-counter-background-color,#ff253a);border-radius:var(--fa-counter-border-radius,1em);box-sizing:border-box;color:var(--fa-inverse,#fff);line-height:var(--fa-counter-line-height,1);max-width:var(--fa-counter-max-width,5em);min-width:var(--fa-counter-min-width,1.5em);overflow:hidden;padding:var(--fa-counter-padding,.25em .5em);right:var(--fa-right,0);text-overflow:ellipsis;top:var(--fa-top,0);-webkit-transform:scale(var(--fa-counter-scale,.25));transform:scale(var(--fa-counter-scale,.25));-webkit-transform-origin:top right;transform-origin:top right}.fa-layers-bottom-right{bottom:var(--fa-bottom,0);right:var(--fa-right,0);top:auto;-webkit-transform:scale(var(--fa-layers-scale,.25));transform:scale(var(--fa-layers-scale,.25));-webkit-transform-origin:bottom right;transform-origin:bottom right}.fa-layers-bottom-left{bottom:var(--fa-bottom,0);left:var(--fa-left,0);right:auto;top:auto;-webkit-transform:scale(var(--fa-layers-scale,.25));transform:scale(var(--fa-layers-scale,.25));-webkit-transform-origin:bottom left;transform-origin:bottom left}.fa-layers-top-right{top:var(--fa-top,0);right:var(--fa-right,0);-webkit-transform:scale(var(--fa-layers-scale,.25));transform:scale(var(--fa-layers-scale,.25));-webkit-transform-origin:top right;transform-origin:top right}.fa-layers-top-left{left:var(--fa-left,0);right:auto;top:var(--fa-top,0);-webkit-transform:scale(var(--fa-layers-scale,.25));transform:scale(var(--fa-layers-scale,.25));-webkit-transform-origin:top left;transform-origin:top left}.fa-1x{font-size:1em}.fa-2x{font-size:2em}.fa-3x{font-size:3em}.fa-4x{font-size:4em}.fa-5x{font-size:5em}.fa-6x{font-size:6em}.fa-7x{font-size:7em}.fa-8x{font-size:8em}.fa-9x{font-size:9em}.fa-10x{font-size:10em}.fa-2xs{font-size:.625em;line-height:.1em;vertical-align:.225em}.fa-xs{font-size:.75em;line-height:.0833333337em;vertical-align:.125em}.fa-sm{font-size:.875em;line-height:.0714285718em;vertical-align:.0535714295em}.fa-lg{font-size:1.25em;line-height:.05em;vertical-align:-.075em}.fa-xl{font-size:1.5em;line-height:.0416666682em;vertical-align:-.125em}.fa-2xl{font-size:2em;line-height:.03125em;vertical-align:-.1875em}.fa-fw{text-align:center;width:1.25em}.fa-ul{list-style-type:none;margin-left:var(--fa-li-margin,2.5em);padding-left:0}.fa-ul>li{position:relative}.fa-li{left:calc(var(--fa-li-width,2em) * -1);position:absolute;text-align:center;width:var(--fa-li-width,2em);line-height:inherit}.fa-border{border-color:var(--fa-border-color,#eee);border-radius:var(--fa-border-radius,.1em);border-style:var(--fa-border-style,solid);border-width:var(--fa-border-width,.08em);padding:var(--fa-border-padding,.2em .25em .15em)}.fa-pull-left{float:left;margin-right:var(--fa-pull-margin,.3em)}.fa-pull-right{float:right;margin-left:var(--fa-pull-margin,.3em)}.fa-beat{-webkit-animation-name:fa-beat;animation-name:fa-beat;-webkit-animation-delay:var(--fa-animation-delay,0s);animation-delay:var(--fa-animation-delay,0s);-webkit-animation-direction:var(--fa-animation-direction,normal);animation-direction:var(--fa-animation-direction,normal);-webkit-animation-duration:var(--fa-animation-duration,1s);animation-duration:var(--fa-animation-duration,1s);-webkit-animation-iteration-count:var(--fa-animation-iteration-count,infinite);animation-iteration-count:var(--fa-animation-iteration-count,infinite);-webkit-animation-timing-function:var(--fa-animation-timing,ease-in-out);animation-timing-function:var(--fa-animation-timing,ease-in-out)}.fa-bounce{-webkit-animation-name:fa-bounce;animation-name:fa-bounce;-webkit-animation-delay:var(--fa-animation-delay,0s);animation-delay:var(--fa-animation-delay,0s);-webkit-animation-direction:var(--fa-animation-direction,normal);animation-direction:var(--fa-animation-direction,normal);-webkit-animation-duration:var(--fa-animation-duration,1s);animation-duration:var(--fa-animation-duration,1s);-webkit-animation-iteration-count:var(--fa-animation-iteration-count,infinite);animation-iteration-count:var(--fa-animation-iteration-count,infinite);-webkit-animation-timing-function:var(--fa-animation-timing,cubic-bezier(.28,.84,.42,1));animation-timing-function:var(--fa-animation-timing,cubic-bezier(.28,.84,.42,1))}.fa-fade{-webkit-animation-name:fa-fade;animation-name:fa-fade;-webkit-animation-delay:var(--fa-animation-delay,0s);animation-delay:var(--fa-animation-delay,0s);-webkit-animation-direction:var(--fa-animation-direction,normal);animation-direction:var(--fa-animation-direction,normal);-webkit-animation-duration:var(--fa-animation-duration,1s);animation-duration:var(--fa-animation-duration,1s);-webkit-animation-iteration-count:var(--fa-animation-iteration-count,infinite);animation-iteration-count:var(--fa-animation-iteration-count,infinite);-webkit-animation-timing-function:var(--fa-animation-timing,cubic-bezier(.4,0,.6,1));animation-timing-function:var(--fa-animation-timing,cubic-bezier(.4,0,.6,1))}.fa-beat-fade{-webkit-animation-name:fa-beat-fade;animation-name:fa-beat-fade;-webkit-animation-delay:var(--fa-animation-delay,0s);animation-delay:var(--fa-animation-delay,0s);-webkit-animation-direction:var(--fa-animation-direction,normal);animation-direction:var(--fa-animation-direction,normal);-webkit-animation-duration:var(--fa-animation-duration,1s);animation-duration:var(--fa-animation-duration,1s);-webkit-animation-iteration-count:var(--fa-animation-iteration-count,infinite);animation-iteration-count:var(--fa-animation-iteration-count,infinite);-webkit-animation-timing-function:var(--fa-animation-timing,cubic-bezier(.4,0,.6,1));animation-timing-function:var(--fa-animation-timing,cubic-bezier(.4,0,.6,1))}.fa-flip{-webkit-animation-name:fa-flip;animation-name:fa-flip;-webkit-animation-delay:var(--fa-animation-delay,0s);animation-delay:var(--fa-animation-delay,0s);-webkit-animation-direction:var(--fa-animation-direction,normal);animation-direction:var(--fa-animation-direction,normal);-webkit-animation-duration:var(--fa-animation-duration,1s);animation-duration:var(--fa-animation-duration,1s);-webkit-animation-iteration-count:var(--fa-animation-iteration-count,infinite);animation-iteration-count:var(--fa-animation-iteration-count,infinite);-webkit-animation-timing-function:var(--fa-animation-timing,ease-in-out);animation-timing-function:var(--fa-animation-timing,ease-in-out)}.fa-shake{-webkit-animation-name:fa-shake;animation-name:fa-shake;-webkit-animation-delay:var(--fa-animation-delay,0s);animation-delay:var(--fa-animation-delay,0s);-webkit-animation-direction:var(--fa-animation-direction,normal);animation-direction:var(--fa-animation-direction,normal);-webkit-animation-duration:var(--fa-animation-duration,1s);animation-duration:var(--fa-animation-duration,1s);-webkit-animation-iteration-count:var(--fa-animation-iteration-count,infinite);animation-iteration-count:var(--fa-animation-iteration-count,infinite);-webkit-animation-timing-function:var(--fa-animation-timing,linear);animation-timing-function:var(--fa-animation-timing,linear)}.fa-spin{-webkit-animation-name:fa-spin;animation-name:fa-spin;-webkit-animation-delay:var(--fa-animation-delay,0s);animation-delay:var(--fa-animation-delay,0s);-webkit-animation-direction:var(--fa-animation-direction,normal);animation-direction:var(--fa-animation-direction,normal);-webkit-animation-duration:var(--fa-animation-duration,2s);animation-duration:var(--fa-animation-duration,2s);-webkit-animation-iteration-count:var(--fa-animation-iteration-count,infinite);animation-iteration-count:var(--fa-animation-iteration-count,infinite);-webkit-animation-timing-function:var(--fa-animation-timing,linear);animation-timing-function:var(--fa-animation-timing,linear)}.fa-spin-reverse{--fa-animation-direction:reverse}.fa-pulse,.fa-spin-pulse{-webkit-animation-name:fa-spin;animation-name:fa-spin;-webkit-animation-direction:var(--fa-animation-direction,normal);animation-direction:var(--fa-animation-direction,normal);-webkit-animation-duration:var(--fa-animation-duration,1s);animation-duration:var(--fa-animation-duration,1s);-webkit-animation-iteration-count:var(--fa-animation-iteration-count,infinite);animation-iteration-count:var(--fa-animation-iteration-count,infinite);-webkit-animation-timing-function:var(--fa-animation-timing,steps(8));animation-timing-function:var(--fa-animation-timing,steps(8))}@media (prefers-reduced-motion:reduce){.fa-beat,.fa-beat-fade,.fa-bounce,.fa-fade,.fa-flip,.fa-pulse,.fa-shake,.fa-spin,.fa-spin-pulse{-webkit-animation-delay:-1ms;animation-delay:-1ms;-webkit-animation-duration:1ms;animation-duration:1ms;-webkit-animation-iteration-count:1;animation-iteration-count:1;-webkit-transition-delay:0s;transition-delay:0s;-webkit-transition-duration:0s;transition-duration:0s}}@-webkit-keyframes fa-beat{0%,90%{-webkit-transform:scale(1);transform:scale(1)}45%{-webkit-transform:scale(var(--fa-beat-scale,1.25));transform:scale(var(--fa-beat-scale,1.25))}}@keyframes fa-beat{0%,90%{-webkit-transform:scale(1);transform:scale(1)}45%{-webkit-transform:scale(var(--fa-beat-scale,1.25));transform:scale(var(--fa-beat-scale,1.25))}}@-webkit-keyframes fa-bounce{0%{-webkit-transform:scale(1,1) translateY(0);transform:scale(1,1) translateY(0)}10%{-webkit-transform:scale(var(--fa-bounce-start-scale-x,1.1),var(--fa-bounce-start-scale-y,.9)) translateY(0);transform:scale(var(--fa-bounce-start-scale-x,1.1),var(--fa-bounce-start-scale-y,.9)) translateY(0)}30%{-webkit-transform:scale(var(--fa-bounce-jump-scale-x,.9),var(--fa-bounce-jump-scale-y,1.1)) translateY(var(--fa-bounce-height,-.5em));transform:scale(var(--fa-bounce-jump-scale-x,.9),var(--fa-bounce-jump-scale-y,1.1)) translateY(var(--fa-bounce-height,-.5em))}50%{-webkit-transform:scale(var(--fa-bounce-land-scale-x,1.05),var(--fa-bounce-land-scale-y,.95)) translateY(0);transform:scale(var(--fa-bounce-land-scale-x,1.05),var(--fa-bounce-land-scale-y,.95)) translateY(0)}57%{-webkit-transform:scale(1,1) translateY(var(--fa-bounce-rebound,-.125em));transform:scale(1,1) translateY(var(--fa-bounce-rebound,-.125em))}64%{-webkit-transform:scale(1,1) translateY(0);transform:scale(1,1) translateY(0)}100%{-webkit-transform:scale(1,1) translateY(0);transform:scale(1,1) translateY(0)}}@keyframes fa-bounce{0%{-webkit-transform:scale(1,1) translateY(0);transform:scale(1,1) translateY(0)}10%{-webkit-transform:scale(var(--fa-bounce-start-scale-x,1.1),var(--fa-bounce-start-scale-y,.9)) translateY(0);transform:scale(var(--fa-bounce-start-scale-x,1.1),var(--fa-bounce-start-scale-y,.9)) translateY(0)}30%{-webkit-transform:scale(var(--fa-bounce-jump-scale-x,.9),var(--fa-bounce-jump-scale-y,1.1)) translateY(var(--fa-bounce-height,-.5em));transform:scale(var(--fa-bounce-jump-scale-x,.9),var(--fa-bounce-jump-scale-y,1.1)) translateY(var(--fa-bounce-height,-.5em))}50%{-webkit-transform:scale(var(--fa-bounce-land-scale-x,1.05),var(--fa-bounce-land-scale-y,.95)) translateY(0);transform:scale(var(--fa-bounce-land-scale-x,1.05),var(--fa-bounce-land-scale-y,.95)) translateY(0)}57%{-webkit-transform:scale(1,1) translateY(var(--fa-bounce-rebound,-.125em));transform:scale(1,1) translateY(var(--fa-bounce-rebound,-.125em))}64%{-webkit-transform:scale(1,1) translateY(0);transform:scale(1,1) translateY(0)}100%{-webkit-transform:scale(1,1) translateY(0);transform:scale(1,1) translateY(0)}}@-webkit-keyframes fa-fade{50%{opacity:var(--fa-fade-opacity,.4)}}@keyframes fa-fade{50%{opacity:var(--fa-fade-opacity,.4)}}@-webkit-keyframes fa-beat-fade{0%,100%{opacity:var(--fa-beat-fade-opacity,.4);-webkit-transform:scale(1);transform:scale(1)}50%{opacity:1;-webkit-transform:scale(var(--fa-beat-fade-scale,1.125));transform:scale(var(--fa-beat-fade-scale,1.125))}}@keyframes fa-beat-fade{0%,100%{opacity:var(--fa-beat-fade-opacity,.4);-webkit-transform:scale(1);transform:scale(1)}50%{opacity:1;-webkit-transform:scale(var(--fa-beat-fade-scale,1.125));transform:scale(var(--fa-beat-fade-scale,1.125))}}@-webkit-keyframes fa-flip{50%{-webkit-transform:rotate3d(var(--fa-flip-x,0),var(--fa-flip-y,1),var(--fa-flip-z,0),var(--fa-flip-angle,-180deg));transform:rotate3d(var(--fa-flip-x,0),var(--fa-flip-y,1),var(--fa-flip-z,0),var(--fa-flip-angle,-180deg))}}@keyframes fa-flip{50%{-webkit-transform:rotate3d(var(--fa-flip-x,0),var(--fa-flip-y,1),var(--fa-flip-z,0),var(--fa-flip-angle,-180deg));transform:rotate3d(var(--fa-flip-x,0),var(--fa-flip-y,1),var(--fa-flip-z,0),var(--fa-flip-angle,-180deg))}}@-webkit-keyframes fa-shake{0%{-webkit-transform:rotate(-15deg);transform:rotate(-15deg)}4%{-webkit-transform:rotate(15deg);transform:rotate(15deg)}24%,8%{-webkit-transform:rotate(-18deg);transform:rotate(-18deg)}12%,28%{-webkit-transform:rotate(18deg);transform:rotate(18deg)}16%{-webkit-transform:rotate(-22deg);transform:rotate(-22deg)}20%{-webkit-transform:rotate(22deg);transform:rotate(22deg)}32%{-webkit-transform:rotate(-12deg);transform:rotate(-12deg)}36%{-webkit-transform:rotate(12deg);transform:rotate(12deg)}100%,40%{-webkit-transform:rotate(0);transform:rotate(0)}}@keyframes fa-shake{0%{-webkit-transform:rotate(-15deg);transform:rotate(-15deg)}4%{-webkit-transform:rotate(15deg);transform:rotate(15deg)}24%,8%{-webkit-transform:rotate(-18deg);transform:rotate(-18deg)}12%,28%{-webkit-transform:rotate(18deg);transform:rotate(18deg)}16%{-webkit-transform:rotate(-22deg);transform:rotate(-22deg)}20%{-webkit-transform:rotate(22deg);transform:rotate(22deg)}32%{-webkit-transform:rotate(-12deg);transform:rotate(-12deg)}36%{-webkit-transform:rotate(12deg);transform:rotate(12deg)}100%,40%{-webkit-transform:rotate(0);transform:rotate(0)}}@-webkit-keyframes fa-spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes fa-spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}.fa-rotate-90{-webkit-transform:rotate(90deg);transform:rotate(90deg)}.fa-rotate-180{-webkit-transform:rotate(180deg);transform:rotate(180deg)}.fa-rotate-270{-webkit-transform:rotate(270deg);transform:rotate(270deg)}.fa-flip-horizontal{-webkit-transform:scale(-1,1);transform:scale(-1,1)}.fa-flip-vertical{-webkit-transform:scale(1,-1);transform:scale(1,-1)}.fa-flip-both,.fa-flip-horizontal.fa-flip-vertical{-webkit-transform:scale(-1,-1);transform:scale(-1,-1)}.fa-rotate-by{-webkit-transform:rotate(var(--fa-rotate-angle,none));transform:rotate(var(--fa-rotate-angle,none))}.fa-stack{display:inline-block;vertical-align:middle;height:2em;position:relative;width:2.5em}.fa-stack-1x,.fa-stack-2x{bottom:0;left:0;margin:auto;position:absolute;right:0;top:0;z-index:var(--fa-stack-z-index,auto)}.svg-inline--fa.fa-stack-1x{height:1em;width:1.25em}.svg-inline--fa.fa-stack-2x{height:2em;width:2.5em}.fa-inverse{color:var(--fa-inverse,#fff)}.fa-sr-only,.sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border-width:0}.fa-sr-only-focusable:not(:focus),.sr-only-focusable:not(:focus){position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border-width:0}.svg-inline--fa .fa-primary{fill:var(--fa-primary-color,currentColor);opacity:var(--fa-primary-opacity,1)}.svg-inline--fa .fa-secondary{fill:var(--fa-secondary-color,currentColor);opacity:var(--fa-secondary-opacity,.4)}.svg-inline--fa.fa-swap-opacity .fa-primary{opacity:var(--fa-secondary-opacity,.4)}.svg-inline--fa.fa-swap-opacity .fa-secondary{opacity:var(--fa-primary-opacity,1)}.svg-inline--fa mask .fa-primary,.svg-inline--fa mask .fa-secondary{fill:#000}.fa-duotone.fa-inverse,.fad.fa-inverse{color:var(--fa-inverse,#fff)}</style><link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/bg.png">
    <title>Employee Management</title>

    <meta name="csrf-token" content="DBzLlB1e4B0ZQn87ZW5MSBzjmFwbWifAaAWbvTiK">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet">
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/dt-1.11.5/datatables.min.css"/> -->
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">-->

    <!-- CSS Files -->
    <link id="pagestyle" href="/assets/css/argon-dashboard.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/assets/css/datatables.min.css">




       
       
</head>

<body class="g-sidenav-show">


        <!-- <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-2 fixed-start ms-2 bg-default ps" id="sidenav-main">
    <div class="sidenav-header " style="background-color:#338E8C"> -->

        <svg class="svg-inline--fa fa-xmark p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i> Font Awesome fontawesome.com -->
      
    </div>
    <div class="sidenav collapsed" id="sidenav">
    <a class="navbar-brand"style="backgrounds-color:white" href="">
            <!-- <img src="/assets/img/logo.png" class="navbar-brand-img" alt="main_logo"> -->
            <span class=" font-weight-bold text-lg" style="width: 200px;margin-left:58px;">Nilatech </span>
        </a>
        <ul class="navbar-nav">
            <!-- <li class="nav-item">
                <a href="http://127.0.0.1:8000/home" class="nav-link " aria-controls="dashboard" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                         <i class="fa fa-house text-sm opacity-10" style="color: #FD1717;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li> -->


            <li class="nav-item" id="ddd">
                <a href="<?php echo e(route('home')); ?>" class="nav-link " aria-controls="dashboard" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <!-- <i class="fa fa-house text-sm opacity-10" style="color: #FD1717;"></i> -->
                    </div>
                    <span class="nav-link-text ms-1" style="color:white">Dashboard</span>
                </a>
            </li>
            <li class="nav-item sidemenuitem" id="menuAttendance" style="">
                <a href="<?php echo e(route('user_details')); ?>  " class="nav-link " aria-controls="attendance" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <!-- <i class="fas fa-history text-sm opacity-10" style="color: #00FF13;"></i> -->
                    </div>
                    <span class="nav-link-text ms-1" style="color:white">User Details</span>
                </a>
            </li>
            <li class="nav-item sidemenuitem" id="menuProject" style="">
                <a href="<?php echo e(route('projectview')); ?> "  class="nav-link " aria-controls="Project" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <!-- <i class="fa-solid fa-dice opacity-10" style="color: #00FF13;"></i> -->
                    </div>
                    <span class="nav-link-text ms-1" style="color:white">Project Details</span>
                </a>
            </li>
             <li class="nav-item sidemenuitem " id="menuUsers" style="display:none;">
                <a href="http://127.0.0.1:8000/users-management" class="nav-link " aria-controls="users" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <!-- <i class="fa fa-user text-sm opacity-10" style="color: #FFFF00;"></i> -->
                    </div>
                    <span class="nav-link-text ms-1"style="color:white">Details</span>
                </a>
            </li>
           



        </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></aside>
        <main class="main-content position-relative border-radius-lg ps">
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
  
</nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

                <ul class="navbar-nav  justify-content-end ms-md-auto pe-md-3 d-flex align-items-center">

                    <li class="nav-item d-flex align-items-center">
                        <form role="form" method="post" action="<?php echo e(route('logout')); ?>" id="logout-form" class="d-inline-block">
    <input type="hidden" name="_token" value="DBzLlB1e4B0ZQn87ZW5MSBzjmFwbWifAaAWbvTiK" autocomplete="off">
    <!-- <label class="nav-link text-white font-weight-bold px-0 d-inline-block">
        <span class="d-sm-inline d-none me-3"> Welcome sandy</span>
    </label> -->
    <style>
        @media screen and (max-width: 1000px) {
            #profileDropdown {
                margin-left: 140px !important;
            }
        }
    </style>
    <nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="dropdown ms-auto">
            <button
                class="btn border-0 p-0"
                type="button"
                id="profileDropdown"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                style="
                    width: 50px;
                    height: 50px;
                    background-color: #57A6A1;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                ">
                <i class="fas fa-user" style="color: white; font-size: 24px;"></i>
            </button>

            <!-- Dropdown Menu -->
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li>
                    <a class="dropdown-item" href="/update">
                        <i class="fas fa-user-circle me-2"></i>
                        <?php echo auth()->user()->username; ?>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="/settings">
                        <i class="fas fa-cog me-2"></i>
                        Settings
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
    <?php echo csrf_field(); ?>
    <button type="submit" class="dropdown-item text-danger">
        <i class="fas fa-sign-out-alt me-2"></i>
        Logout
    </button>
</form>

                    
            </ul>
        </div>
    </div>
</nav>
            
                     <li class="nav-item px-3 d-flex align-items-center">
                        <a href="#" onclick="profileSetting(2);">
                            <span class="">
                                <svg class="svg-inline--fa fa-user me-sm-0" style="color: white;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path></svg><!-- <i class="fa fa-user me-sm-0" style="color: white;"></i> Font Awesome fontawesome.com -->
                            </span>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>


    <!-- <div class="card" id="basic-info"style="background-color:lightgray;"> -->
    <button class="toggle-btn" id="toggleBtn" onclick="togglePosition();" style="
     /* left:70px; */
    width: 50px;
    height: 50px;
    background-color: #57A6A1;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: -13%;
    transition: margin-left 0.3s ease-in-out;">☰
</button>

    <!-- User and Project Cards -->
    <div class="card-body">
   
    <div class="justify-content-center">
    <h3 class="mb-8 text-center">Project Details</h3>
    <div class="card text-center" id="basic-info" style="width:90%; margin:auto;">
           
            
            <?php $groupedProjects = $projects->groupBy('project_name'); ?> <!-- Group projects by name -->
            <div class="project-section p-3 bg-white text-dark" style="border-radius: 10px;">
            <div class="scrollable-content"> <!-- Scrollable container -->
    <?php $__currentLoopData = $groupedProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectName => $tasks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="project-section p-3 bg-white text-dark" style="border-radius: 10px; margin-bottom: 15px;">
            <!-- Project Name and Code -->
            <p class="text-center">
                <strong><?php echo e($tasks->first()->project_code); ?>:</strong> <?php echo e($projectName); ?>

                </p>
                <button class="btn btn-primary btn-sm show-tasks-btn" data-target="#tasks-<?php echo e(Str::slug($projectName)); ?>">Show</button>
           
            <!-- Collapsible Task List -->
            <div id="tasks-<?php echo e(Str::slug($projectName)); ?>" class="scrollable-project-content collapse mt-3">
                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <p><strong>Task: </strong><?php echo e($task->task_name); ?></p>
                        </div>
                        <div class="d-flex align-items-center gap-2 w-50">
                            <p><strong></strong> <?php echo e($task->username ?? 'No user assigned'); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

    <!-- Modal Structure for Duration -->   


<?php $__env->startPush('css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet"> <!-- SweetAlert2 CSS -->
    <style>
        .scrollable-content {
                max-height: 500px; /* Set the maximum height of the scrollable area */
                overflow-y: auto;  /* Enable vertical scrolling */
                padding-right: 10px; 
                /* Add some padding for better spacing */
            }

            /* Optional: Customize the scrollbar appearance */
            .scrollable-content::-webkit-scrollbar {
                width: 6px; /* Width of the scrollbar */
            }

            .scrollable-content::-webkit-scrollbar-thumb {
                background-color: #037479; /* Color of the scrollbar thumb */
                border-radius: 4px; /* Rounded corners for the scrollbar */
            }

            .scrollable-content::-webkit-scrollbar-track {
                background: #f1f1f1; /* Background color of the scrollbar track */
            }
        .project-section {
            margin-bottom: 20px; /* Adds space between projects */
        }

        .scrollable-project-content {
            max-height: 200px; /* Limit the height for each task list */
            overflow-y: auto;  /* Enable vertical scrolling */
            padding: 10px;
            background: #ffffff; /* Light background for better visibility */
            border: 1px solid #ddd; /* Add a border for separation */
            border-radius: 8px; /* Rounded corners */
        }

        /* Custom scrollbar styles (optional) */
        .scrollable-project-content::-webkit-scrollbar {
            width: 8px;
        }

        .scrollable-project-content::-webkit-scrollbar-thumb {
            background-color: #037479;
            border-radius: 4px;
        }

        .scrollable-project-content::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="/assets/js/plugins/choices.min.js"></script>
    <script src="/assets/js/core/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 JS -->
    <script>
        // Profile setting redirect
        function profileSetting(user) {
            window.location.href = "/profileView/" + user;
        }
        document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".show-tasks-btn");

            buttons.forEach(button => {
                button.addEventListener("click", function () {
                    const targetId = this.getAttribute("data-target");
                    const target = document.querySelector(targetId);

                    if (target.classList.contains("collapse")) {
                        target.classList.remove("collapse"); // Show the tasks
                        this.textContent = "Hide"; // Change button text
                    } else {
                        target.classList.add("collapse"); // Hide the tasks
                        this.textContent = "Show"; // Change button text back
                    }
                });
            });
        });

        // Open the modal when the duration input is clicked
        $(document).on('click', '.duration-input', function () {
            const projName = $(this).data('project-name');
            $('#durationModal').data('project-name', projName);  // Store project name in modal data
            $('#durationModal').show();  // Show the modal
        });

        // Close modal when the close button is clicked
        $('#closeModalButton').on('click', function () {
            $('#durationModal').hide();  // Hide the modal
        });

        // Save the duration
        $('#saveDurationButton').on('click', function () {
            const projectName = $('#durationModal').data('project-name');
            const duration = $('#durationText').val();

            if (!duration) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter a duration.',
                });
                return;
            }

            $.ajax({
                url: "<?php echo e(route('save-duration')); ?>",
                method: "POST",
                data: {
                    proj_name: projectName,
                    duration: duration,
                    _token: "<?php echo e(csrf_token()); ?>", 
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to save duration.',
                        });
                    }
                    $('#durationModal').hide();  // Hide the modal after saving
                },
                error: function (error) {
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'An error occurred',
                        text: 'An error occurred while saving duration.',
                    });
                    $('#durationModal').hide();  // Hide the modal if there's an error
                },
            });
        });
    </script>
<script>
   function start(){
       const sidenav = document.getElementById("sidenav");
    // const toggleBtn = document.getElementById("toggleBtn");

    // toggleBtn.addEventListener("click", () => {
      sidenav.classList.toggle("collapsed");
    // });
}
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

                $(document).ready(function() {
                    var userid = $("#inUserId").val();

                    getUserRoles(userid);
                    function fetchWorkOrderCount() {
                $.ajax({
                    url: '/path/to/api/endpoint', // Replace with your actual API endpoint
                    method: 'GET',
                    success: function(data) {
                        // Assuming the data contains the work order count
                        if (data.workOrderCount && data.workOrderCount > 0) {
                            $('#menuWorkOrderHistory .nav-link-text').append('<span class="badge badge-pill badge-danger">' + data.workOrderCount + '</span>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to fetch work order count:', error);
                    }
                });
            }
            fetchWorkOrderCount();
        });
		</script>
	<script>
		function updateRunningTime() {
        const timeLabel = document.getElementById('runningTime');
        const now = new Date();

        // Format the time (HH:mm:ss)
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        const formattedTime = `${hours}:${minutes}:${seconds}`;

        // Update the label
        timeLabel.textContent = formattedTime;
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the time display
        updateRunningTime();

        // Update the time every second
        setInterval(updateRunningTime, 1000);
    });
        function showCheckInButton() {
            var locationSelect = document.getElementById("location");
            var btnCheckIn = document.getElementById("toggleCheckInOut");

            if (locationSelect.value !== "0") {
                btnCheckIn.style.display = "inline-block"; // Show the button when a location is selected
            } else {
                btnCheckIn.style.display = "none"; // Hide the button if no location is selected
            }
        }
		
		function toggleCheckInOut() {
			const button = document.getElementById("btnCheckInOut");
			const currentStatus = button.getAttribute("data-status");

			if (currentStatus === "checkin") {
				// Perform Check-In Logic
				performCheckIn().then(() => {
					button.textContent = "Check Out";
					button.classList.remove("btn-success");
					button.classList.add("btn-danger");
					button.setAttribute("data-status", "checkout");
				}).catch((error) => {
					console.error("Check-In Error:", error);
				});
			} else if (currentStatus === "checkout") {
				// Perform Check-Out Logic
				performCheckOut().then(() => {
					button.textContent = "Checked Out";
					button.classList.remove("btn-danger");
					button.classList.add("btn-secondary");
					button.disabled = true; // Disable button after check-out
				}).catch((error) => {
					console.error("Check-Out Error:", error);
				});
			}
		}
		document.addEventListener('DOMContentLoaded', function () {
        const locationDropdown = document.getElementById('location');
        const btnCheckInOut = document.getElementById('btnCheckInOut');

        // Initially hide the button if no location is selected
        if (locationDropdown && (!locationDropdown.value || locationDropdown.value === "0")) {
            btnCheckInOut.style.display = "none";
        }

        // Listen for changes on the location dropdown
        if (locationDropdown) {
            locationDropdown.addEventListener('change', function () {
                const selectedLocation = locationDropdown.value;

                if (selectedLocation && selectedLocation !== "0") {
                    // Show the button when a valid location is selected
                    btnCheckInOut.style.display = "inline-block";
                } else {
                    // Hide the button if no location is selected
                    btnCheckInOut.style.display = "none";
                }
            });
        }
    });

		function performCheckIn() {
			return new Promise((resolve, reject) => {
				const locationId = $("#location").val();
				
				if (locationId === "0" || locationId === "") {
					Swal.fire({
						icon: 'warning',
						title: 'Location is required',
						text: 'Please select a location before proceeding.',
						showCancelButton: false,
						customClass: {
							confirmButton: 'btn btn-success mx-2',
						},
						buttonsStyling: false
					});
					reject();
					return;
				}

				// Simulate a server call with setTimeout
				setTimeout(() => {
					window.location.href = "/attendance_update/" + locationId;
					resolve();
				}, 1000);
			});
		}

		function performCheckOut() {
			return new Promise((resolve, reject) => {
				const locationId = $("input[name='location']").val();

				if (locationId === "0" || locationId === "" || !locationId) {
					Swal.fire({
						icon: 'warning',
						title: 'Location is required',
						text: 'Please select a location before proceeding.',
						showCancelButton: false,
						customClass: {
							confirmButton: 'btn btn-danger mx-2',
						},
						buttonsStyling: false
					});
					reject();
					return;
				}

				// Simulate a server call with setTimeout
				setTimeout(() => {
					window.location.href = "/attendance_update/" + locationId;
					resolve();
				}, 1000);
			});
		}

</script>
    <script>
		function profileSetting(user){
			window.location.href = "/profileView/"+user;
		}

		var workOrderName = "";
		var workAreaId = 0;
		var workAreaName = "";
		var startDateTxt = "";
		var endDateTxt = "";
		var workOrderId = 0;

		function logins(){
			console.log("hello");
		}
		function validateFileds(){
			workAreaId =$("#selWorkarea").val();
			if (workAreaId <= 0) {
				$("#selWorkarea").focus();
				Swal.fire({
					icon: 'warning',
					title: '<?php echo app('translator')->get('Checkin'); ?>',
					text: '<?php echo app('translator')->get('Please Select the Location'); ?>',
					//html: '<div class="form-group"><label class="form-label">Please select the workarea!</label></div>',
					showCancelButton: false,
					customClass: {
					confirmButton: 'btn btn-success mx-2',
					//cancelButton: 'btn btn-danger mx-2'
					},
					buttonsStyling: false
				}).then(function (result) {

				});
				return;
			}

			if($("#startdate").val() == "")
			{
				Swal.fire({
					icon: 'warning',
					title: '<?php echo app('translator')->get('words.workorder'); ?>',
					text: '<?php echo app('translator')->get('words.pleaseselectstartdate'); ?>',
					//html: '<div class="form-group"><label class="form-label">Please Select EndDate </label></div>',
					showCancelButton: false,
					customClass: {
					confirmButton: 'btn btn-success mx-2',
					//cancelButton: 'btn btn-danger mx-2'
					},
					buttonsStyling: false
				}).then(function (result) {

				});
				return;
			}
			
			startDateTxt =$("#startdate").val();

			if($("#enddate").val() == "")
			{
				Swal.fire({
					icon: 'warning',
					title: '<?php echo app('translator')->get('words.workorder'); ?>',
					text: '<?php echo app('translator')->get('words.pleaseselectenddate'); ?>',
					//html: '<div class="form-group"><label class="form-label">Please Select EndDate </label></div>',
					showCancelButton: false,
					customClass: {
					confirmButton: 'btn btn-success mx-2',
					//cancelButton: 'btn btn-danger mx-2'
					},
					buttonsStyling: false
				}).then(function (result) {

				});

				return;
			}
			endDateTxt =$("#enddate").val()
			sendCreateRequest();
		}

		function sendCreateRequest()
		{		
			var fd = new FormData();
			fd.append('workOrderName',workOrderName);
			fd.append('workAreaId',workAreaId);
			fd.append('workAreaName',workAreaName);
			fd.append('planned_startdate',startDateTxt);
			fd.append('planned_enddate',endDateTxt);
			fd.append('_token','<?php echo e(csrf_token()); ?>');

			$.ajax({
				url: '<?php echo e(route('workorder_create')); ?>',
				type: 'post',
				data:fd,
				contentType: false,
				processData: false,
				success: function(response){
				workOrderId = response.workorderid;
					Swal.fire({
						icon: 'success',
						title: workOrderName,
						text: '<?php echo app('translator')->get('words.workordercreatedsuccessfully'); ?>',
						//html: '<div class="form-group"><label class="form-label">Work Order Name Already Exists.</label></div>',
						showCancelButton: false,
						customClass: {
						confirmButton: 'btn btn-success mx-2'
						},
						buttonsStyling: false
					}).then(function (result) {
							window.location.href = "/home";
					});
				},
			});
		}

		function assignToUser(){
			console.log("hello");
		}

		function assignToUsesr()
		{
			var assignedToUserId = $('#user_name').val();
			var assignedToUserName = $('#user_name option:selected').text();
			var location= $('#user_name').val();
			if(parseInt(assignedToUserId) === 0)
			{
				$('#user_name_error').html('<?php echo app('translator')->get('unsnbemt'); ?>');
				$('#user_name_error').show();
				return;
			}

			var workOrderId = $('#inWorkOrderId').val();
		
			var fd = new FormData();
			fd.append('workOrderId',workOrderId);
			fd.append('assignedToUserId',assignedToUserId);

			fd.append('_token','<?php echo e(csrf_token()); ?>');
			$.ajax({
				url: '<?php echo e(route('assignToUserPreproductionPost')); ?>',
				type: 'post',
				data:fd,
				contentType: false,
				processData: false,
				success: function(response){

					if (response.success)
					{
						Swal.fire({
									icon: 'success',
									title: '<?php echo app('translator')->get('words.workorder'); ?>',
									text: '<?php echo app('translator')->get('words.wororderassign'); ?>' + assignedToUserName,
									showCancelButton: false,
									customClass: {
										confirmButton: 'btn btn-success mx-2'
									},
									buttonsStyling: false
								}).then(function (result) {
										window.location.href = "/home_preproduction";
								});
					}
					else
					{
						Swal.fire({
								icon: 'warning',
								title: '<?php echo app('translator')->get('words.workorder'); ?>',
								text: response.message,
								showCancelButton: false,
								customClass: {
									confirmButton: 'btn btn-success mx-2'
								},
								buttonsStyling: false
							});
					}
				},
			});
		}
    </script>

<script>
 function togglePosition() {
    const sidenav = document.getElementById("sidenav");
    // const toggleBtn = document.getElementById("toggleBtn");

    // toggleBtn.addEventListener("click", () => {
      sidenav.classList.toggle("collapsed");
    // });
    let btn = document.getElementById("toggleBtn");
    if (btn.style.marginLeft === "-13%") {
        btn.style.marginLeft = "53%";  // Move right
    } else {
        btn.style.marginLeft = "-13%"; // Move left
    }
}
   
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

                $(document).ready(function() {
                    var userid = $("#inUserId").val();

                    getUserRoles(userid);
                    function fetchWorkOrderCount() {
                $.ajax({
                    url: '/path/to/api/endpoint', // Replace with your actual API endpoint
                    method: 'GET',
                    success: function(data) {
                        // Assuming the data contains the work order count
                        if (data.workOrderCount && data.workOrderCount > 0) {
                            $('#menuWorkOrderHistory .nav-link-text').append('<span class="badge badge-pill badge-danger">' + data.workOrderCount + '</span>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to fetch work order count:', error);
                    }
                });
            }
            fetchWorkOrderCount();
        });

        function getUserRoles(userid)
        {
            var fd = new FormData();

            fd.append('userid',userid);
            fd.append('_token','<?php echo e(csrf_token()); ?>');

            $.ajax({

                url: '<?php echo e(route('getuserroleforid')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){

                    if (response.success)
                    {
                        $(".sidemenuitem").hide();



                        var roles = response.roles;

                        console.log(roles);
                        var isAdmin = false;

                        for(var i=0;i<roles.length;i++)
                        {
                            if (roles[i].role_id==1)
                            {
                                console.log(roles[i]);
                                isAdmin=true;
                            }
                        }

                        if (isAdmin)
                        {

                            $("#details").show();


                            return;
                        }
                        else{

                            $("#menuAttendance").show();
                            $("#menuProject").show();
                            $("#ddd").show();
                        }
                        var companyDefaultUserId = company ? company.default_user_id : null;
                        for(var i=0;i<roles.length;i++)
                        {

                            if (roles[i].roleid==2)
                            {
                                $("#menuWorkOrderHistory").show();
                                $("#menuAttendance").show();
                                $("#menuProject").show();
                            }
                            if (roles[i].roleid==3)
                            {
                                $("#menuPreproduction").show();
                                if(preproductionCount == 0){
                                    $("#menuPreproductioncount").text(preproductionCount).hide();
                                }
                                else if (preproductionCount != null && !isNaN(preproductionCount))
                                {

                                    $("#menuPreproductioncount").text(preproductionCount).show();
                                }
                            }
                            if (roles[i].roleid==4)
                            {
                                $("#menuSurvey").show();
                                if(surveyCount == 0){
                                    $("#menuSurveycount").text(surveyCount).hide();
                                }
                                else if (surveyCount != null && !isNaN(surveyCount))
                                {

                                    $("#menuSurveycount").text(surveyCount).show();
                                }
                            }
                            if (roles[i].roleid==5)
                            {
                                $("#menuMapCreation").show();
                                if(mapCount == 0){
                                    $("#menuMapcount").text(mapCount).hide();
                                }
                                else if (mapCount != null && !isNaN(mapCount))
                                {

                                    $("#menuMapcount").text(mapCount).show();
                                }
                            }
                            if (roles[i].roleid==6)
                            {
                                $("#menuModelCreation").show();
                                if(modelCount == 0){
                                    $("#menuModelcount").text(modelCount).hide();
                                }
                                else if (modelCount != null && !isNaN(modelCount))
                                {
                                    $("#menuModelcount").text(modelCount).show();
                                }
                            }

                            if (roles[i].roleid==7)
                            {
                                $("#qc").show();
                                if(preqcCount==0){

                                    $("#menuPreqccount").text(preqcCount).hide();
                                }
                                else if (preqcCount != null && !isNaN(preqcCount))
                                {

                                    $("#menuPreqccount").text(preqcCount).show();
                                }
                                if(mapqcCount==0){

                                    $("#menuMapqccount").text(mapqcCount).hide();
                                }
                                else if (mapqcCount != null && !isNaN(mapqcCount))
                                {

                                    $("#menuMapqccount").text(mapqcCount).show();
                                }
                                if(modelqcCount==0)
                                {
                                   $("#menuModelqccount").text(modelqcCount).hide();
                                }
                                else if (modelqcCount != null && !isNaN(modelqcCount))
                                {

                                    $("#menuModelqccount").text(modelqcCount).show();
                                }
                                if(modelareaqcCount==0)
                                {
                                   $("#menuModelareaqccount").text(modelareaqcCount).hide();
                                }
                                else if (modelareaqcCount != null && !isNaN(modelareaqcCount))
                                {

                                    $("#menuModelareaqccount").text(modelareaqcCount).show();
                                }
                            }
                            if (roles[i].roleid==8)
                            {
                                $("#menumapattribute").show();

                            }
                            if (roles[i].roleid==7)
                            {
                                $("#menumodelstatus").show();

                            }
                            if (roles[i].roleid==9)
                            {
                                $("#menumodelareaattribute").show();
                                if(modelareaCount == 0){
                                    $("#menumodelareaattributecount").text(modelareaCount).hide();
                                }
                                else if (modelareaCount != null && !isNaN(modelareaCount))
                                {
                                    $("#menumodelareaattributecount").text(modelareaCount).show();
                                }
                            }
                        }
                        $("#menuDownloadDispatch").show();
                        $("#menuFinalDownload").show();
                        // $("#menuDownloadCADApp").show();
                    }
                },
            });
        }


        // Close the dropdown programmatically
document.addEventListener('click', (e) => {
    const dropdown = document.getElementById('profileDropdown');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    // Check if clicked outside the dropdown
    if (!dropdown.contains(e.target) && !dropdownMenu.contains(e.target)) {
        const bsDropdown = bootstrap.Dropdown.getInstance(dropdownMenu);
        if (bsDropdown) {
            bsDropdown.hide();
        }
    }
});

    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/assets/js/argon-dashboard.js"></script>
    <script src="/assets/js/core/datatables.min.js"></script>
<style>
    #confirmLeaveBtn {
        background-color: #0edae7;
        color: white;
        border: none; /* Remove the default border */
        cursor: pointer; /* Add a pointer cursor on hover */
        transition: background-color 0.3s ease; Smooth transition for background-color
    }

    #confirmLeaveBtn:hover {
        background-color: #218838; /* Darker green on hover */
    }
     .fc-today {
        margin-top: 20px;
        background-color: hsl(185, 100%, 44%) !important; /* Set the background color */
        color: white !important;          Ensure text is visible */
        border: 1px solid black; Black border around day cells */
     }
    .fc-day-leave {
        background-color: #FFCC00 !important; /* Yellow background for leave days */
         color: white !important; White text
    }


    #calendar {
        margin-top: 30%; /* Set the margin-top to 30px */
        border-radius: 5px; /* Optional: Rounded corners */
        max-width: 600px; /* Set the maximum width */
        margin: 0 auto; /* Center the calendar */
        height: 500px; /* Set the height */
    }
    #okLeaveBtn{
        margin-left: 45%;
        margin-top: 7px;
        background-color: red   ;
    }
    #okLeaveBtn:hover {
        background-color: rgb(219, 15, 49); /* Darker Blue on hover */
    }

  </style>
  <style>

    @media (min-width: 768px) {

      #confirmationModal .modal-dialog {
        margin-top: 200px;
      }
    }

    @media (max-width: 767px) {

      #confirmationModal .modal-dialog {
        margin-top: 200px;
      }
    }
  </style>

   </body>
</html><?php /**PATH C:\xampp\htdocs\Nilatech_attendance\resources\views/laravel/project/shows_project.blade.php ENDPATH**/ ?>