jQuery(document).ready(function($){
    $('.toggle').each(function(){
    var s = $(this).next('.checkme').attr('checked');
    if(s=='checked'){
    $(this).toggles({
    on:true,
    checkbox:$(this).next('.checkme')
    });}
    else
    {
    $(this).toggles({
    on:false,
    checkbox:$(this).next('.checkme')
    });
    }
   });
    var logo_count = $('#logo-count').val();
    $('#add-logo').on('click', function(){
    logo_count++;
    var logo_code = '<div class="associate-logo sub-option clearfix">'+
    '<input class="of-input partner-link-input" type="text" placeholder="http://" value="" name="accesspress-staple[partner_logo]['+logo_count+'][link]">'+
    '<input type="text" placeholder="No file chosen" value="" name="accesspress-staple[partner_logo]['+logo_count+'][image]" class="upload">'+
    '<input class="upload-button button" type="button" value="Upload">'+
    '<div id="logo-image" class="screenshot"></div>'+
    '<div class="logo-remove">[X]</div>'+
    '</div>';
    $('.logo-wrap').append(logo_code);
    });
    $(document).on('click','.logo-remove', function(){
            var form_row = $(this);
            form_row.parent().parent('.associate-logo').slideUp('2000');
            $('.associate-logo input').attr('disabled','disabled');
                setTimeout(function(){
                    form_row.parent('.associate-logo').remove();
                    $('.associate-logo input').removeAttr('disabled');
                }, 3000);
    });
        
    $('.header-group').on('click', function(){
        $(this).each(function(){
        $(this).next('.header-content').slideToggle();
        });
    }); 

    $('#optionsframework-metabox .option').addClass('clearfix');
    	jQuery('.switch_options').each(function() {

		//This object
		var obj = jQuery(this);

		var enb = obj.children('.switch_enable'); //cache first element, this is equal to ON
		var dsb = obj.children('.switch_disable'); //cache first element, this is equal to OFF
		var input = obj.children('input'); //cache the element where we must set the value
		var input_val = obj.children('input').val(); //cache the element where we must set the value

		/* Check selected */
		if( 0 == input_val ){
			dsb.addClass('selected');
		}
		else if( 1 == input_val ){
			enb.addClass('selected');
		}

		//Action on user's click(ON)
		enb.on('click', function(){
			$(dsb).removeClass('selected'); //remove "selected" from other elements in this object class(OFF)
			$(this).addClass('selected'); //add "selected" to the element which was just clicked in this object class(ON) 
			$(input).val(1).change(); //Finally change the value to 1
		});

		//Action on user's click(OFF)
		dsb.on('click', function(){
			$(enb).removeClass('selected'); //remove "selected" from other elements in this object class(ON)
			$(this).addClass('selected'); //add "selected" to the element which was just clicked in this object class(OFF) 
			$(input).val(0).change(); // //Finally change the value to 0
		});

	});
            
});
