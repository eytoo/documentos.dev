$(window).on("load",function(){var a=new Chartist.Bar("#peak-circles",{labels:["W1","W2","W3","W4","W5","W6","W7","W8","W9","W10"],series:[[1,2,4,10,6,-2,-1,-4,-8,-2]]},{high:15,low:-15,axisX:{labelInterpolationFnc:function(a,b){return b%2===0?a:null}}});a.on("draw",function(a){"bar"===a.type&&a.group.append(new Chartist.Svg("circle",{cx:a.x2,cy:a.y2,r:2*Math.abs(Chartist.getMultiValue(a.value))+5},"ct-slice-pie"))})});