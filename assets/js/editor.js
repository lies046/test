/* Import TinyMCE */
import tinymce from 'tinymce';

/* Default icons are required for TinyMCE 5.3 or above */
import 'tinymce/icons/default';

/* A theme is also required */
import 'tinymce/themes/silver';

/* Import plugins */
import 'tinymce/plugins/advlist';
import 'tinymce/plugins/code';
import 'tinymce/plugins/emoticons';
import 'tinymce/plugins/emoticons/js/emojis';
import 'tinymce/plugins/link';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/table';
import 'tinymce/plugins/image';
/* Import premium plugins */
/* NOTE: Download separately and add these to /src/plugins */
/* import './plugins/powerpaste/plugin'; */
/* import './plugins/powerpaste/js/wordimport'; */

export function init(selector,dirname){
    tinymce.init({
        selector: '#' + selector,
        plugins: 'image',
        external_plugins:{'ruby': './js/plugins/ruby/plugin.min.js'},
        toolbar: 'image ruby',
        images_upload_url: 'http://localhost/public/?dir=' + dirname,
        skin:false,
        content_css: false,

    })
}