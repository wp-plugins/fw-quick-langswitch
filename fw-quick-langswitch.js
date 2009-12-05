jQuery(document).ready( function() {
   jQuery("a.fwqls_flag").click(function () {
      var linkid = jQuery(this).attr('id');
      var splitlinkid = linkid.split('-');
      var langid = splitlinkid[1];
      document.cookie = 'fwqls='+langid;
    });


}
);

