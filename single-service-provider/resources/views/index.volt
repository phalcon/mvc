{{ get_doctype() }}
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>single-service-provider</title>
    <meta content="Phalcon Framework Team" name="author">
    <meta content="Phalcon Developer Tools" name="generator">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {% block head_custom %}{% endblock %}
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        {% block header %}{% endblock %}
        {% block sidebar %}{% endblock %}

        {% block content %}
            <div class="container-fluid">
                {% include "partials/content.volt" %}
            </div>
        {% endblock %}

        {% block footer %}{% endblock %}
    </div>

    {% block footer_js %}
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    {% endblock %}
</body>
</html>
