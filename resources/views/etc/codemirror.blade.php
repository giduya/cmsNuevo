@section('js')
<script src="{{ asset('app/js/plugins/codemirror/codemirror.js') }}"></script>
<script src="{{ asset('app/js/plugins/codemirror/mode/css/css.js') }}"></script>
<script src="{{ asset('app/js/plugins/codemirror/mode/clike/clike.js') }}"></script>
<script src="{{ asset('app/js/plugins/codemirror/mode/php/php.js') }}"></script>

<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {
        lineNumbers: true,
        matchBrackets: true,
        mode: "text/css",
        indentUnit: 2,
        indentWithTabs: true,
        enterMode: "keep",
        tabMode: "shift",
        inputStyle: "contenteditable",
        showCursorWhenSelecting: 1,
        autofocus: 1
    });
    editor.setSize('100%','350px');
</script>
@stop
