$(function(){$(document).on("focus","input.autocomplete:not(.ui-autocomplete-input)",function(){$(this).css({position:"relative",zIndex:12E3}).autocomplete({source:gptitles,delay:100,minLength:0,select:function(b,a){if(a.item)return this.value=a.item[1],!1}}).data("ui-autocomplete")._renderItem=function(b,a){return $("<li></li>").data("ui-autocomplete-item",a[1]).append("<a>"+$gp.htmlchars(a[0])+"<span>"+$gp.htmlchars(a[1])+"</span></a>").appendTo(b)}})});