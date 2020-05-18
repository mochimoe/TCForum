{% extends 'templates/base.volt' %}
{% block title %}{{ get_title() }}{% endblock %}

{% block content %}
<div class="p-3 d-flex justify-content-center">
    <div class="card bg-dark shadow mb-3 text-white" style="width:35%;">
        <div class="card-header">Edit Jawaban</div>
        <div class="card-body">
            <form action="/komen/update/{{komen.id}}" method="post">
                <div class="form-group">
                    <label for="judul" class=" ">Komentar</label>
                    <textarea class="form-control bg-dark text-white" name="isi" value="">{{komen.isi_komen}}</textarea>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Edit</button>
            </form>
        </div>
    </div>
    
</div>
{% endblock %}