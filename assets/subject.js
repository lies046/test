import './js/editor'
import './styles/app.scss'

/* Initialize TinyMCE */
function render () {
    tinymce.init({
        selector: '#subject_title',
        skin:false,
        content_css: false,
    });
}

render()