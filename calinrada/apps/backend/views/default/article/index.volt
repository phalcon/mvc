{% extends 'layout.volt' %}

{% block body %}
<div class="main-wrapper">
	<div class="active-page">
		<ul>
			<li><span class="active-page-icon frames_blk"></span><span>Admin -> Articles</span></li>
		</ul>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="page-header">
				<h2>Articles layout</h2>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<div class="box-widget">
					<div class="widget-head clearfix">
						<span class="h-icon"><i class="gray-icons truck"></i></span>
						<h4>Articles</h4>
					</div>
					<div class="widget-container">
						<table class="data-tbl-boxy table table-striped table-well responsive">
						<thead>
						<tr>
							<th> #ID </th>
							<th> Title </th>
							<th> Created at </th>
							<th> Updated at </th>
							<th> Created by </th>
							<th> Updated by </th>
							<th> Options </th>
						</tr>
						</thead>
						<tbody>
						{% for article in articles %}
						<tr>
							<td>{{ article.id }} </td>
							<td>{{ article.title }} </td>
							<td>{{ article.created_at }}</td>
							<td>{{ article.updated_at }}</td>
							<td>{{ article.created_by }}</td>
							<td>{{ article.updated_by }}</td>
							<td>Options</td>
						</tr>
						{% endfor %}
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{% endblock %}