function validateEmail(a){var e=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;return a.match(e)}function validateInput(a){var e=!0;return a.removeClass("error"),"email"===a.attr("type")&&(e=validateEmail(a.val())),""===a.val()&&(e=!1),e||a.addClass("error"),e}var $window=jQuery(window),$document=jQuery(document),form=function(a){$document.ready(function(){a("form").attr("novalidate",!0),a("form").submit(function(e){e.preventDefault();var t=!1,r=a(this),n=r.find(".form-message");n.removeClass("active"),r.find("input[required], textarea[required]").each(function(){validateInput(a(this))||(t=!0)});var i=r.serializeArray();i.push({name:"ajax",value:!0}),i=a.param(i),t?n.addClass("active"):a.ajax({type:"POST",url:ajaxurl,data:i}).done(function(a){r.html(a)})}),a("input[required], textarea[required]").blur(function(){validateInput(a(this))})})}(jQuery),form=function(a){$document.ready(function(){a(".btn-toggle-menu").click(function(e){e.preventDefault();var t=a(this),r=a("nav");t.hasClass("active")?(t.removeClass("active"),r.slideUp()):(t.addClass("active"),r.slideDown())})})}(jQuery);