/*
 * Script for placeholder in search box
 * Removes the default text onclick
 */
jQuery('.searchform .search').each(function() {
    var default_value = this.value;
    jQuery(this).focus(function() {
        if(this.value == default_value) {
            this.value = '';
        }
    });
    jQuery(this).blur(function() {
        if(this.value == '') {
            this.value = default_value;
        }
    });
});