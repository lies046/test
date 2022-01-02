import './styles/app.scss'
import {init} from "./js/editor";
import './js/typeahead';
import Bloodhound from "bloodhound-js";
import 'bootstrap-tagsinput';

init('post_text', 'post')

$(function() {
var $input = $('input[data-toggle="tagsinput"]');
if ($input.length) {
    var source = new Bloodhound({
        local: $input.data('tags'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        datumTokenizer: Bloodhound.tokenizers.whitespace
    });
    source.initialize();

    $input.tagsinput({
        trimValue: true,
        focusClass: 'focus',
        typeaheadjs: {
            name: 'tags',
            source: source.ttAdapter()
        }
    });
}
});