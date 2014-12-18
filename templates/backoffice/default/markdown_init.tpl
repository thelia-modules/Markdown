{stylesheets file='assets/css/bootstrap-markdown.min.css' source='Markdown'}
    <link href="{$asset_url}" rel="stylesheet">
{/stylesheets}

<script src="{url file='/markdown/to-markdown.js'}"></script>
<script src="{url file='/markdown/markdown.js'}"></script>
<script src="{url file='/markdown/bootstrap-markdown.js'}"></script>
{javascripts file="assets/locale/bootstrap-markdown.{lang attr="code"}.js" source="Markdown"}
    <script src="{$asset_url}"></script>
{/javascripts}

<script>
    (function($, window, document) {

        $(function() {
            var $selector = $('.wysiwyg'),
                $elem;

            var content;

            $selector.each(function(){
                $elem = $(this);

                $elem.markdown({
                    autofocus: false,
                    savable: false,
                    language: '{lang attr="code"}',
                    onShow: function(e){
                        content = e;
                        if ($elem.val() !== '') {
                            var md = toMarkdown(e.getContent());
                            $elem.val(md);
                        }
                    }
                });

            });

            $selector.on('submit', function() {
                var html = content.parseContent();
                $selector.val(html);
            });

        });

    }(window.jQuery, window, document));
</script>