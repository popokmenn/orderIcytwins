@extends('layouts.app')

@section('title', 'Link Management')

@push('metas')
    <meta name="delete-link" content="/admin/link/_id">
@endpush

@push('javascript')
    <script defer>
        $(function() {
            $("#sortable").sortable();
            $("#sortable").disableSelection();

            window.deleteLink = (id) => {
                let url = $('meta[name=delete-link]').attr('content');
                if (confirm('Are you sure?')) {
                    let form = $('#delete-form');
                    form.prop('action', url.replace('_id', id));
                    form.submit();
                }
            }
        });
    </script>
@endpush

@section('content')
    <section class="section">
        <form action="{{ route('admin.post-links') }}" id="save-form" method="POST">
            @csrf
            <div class="section-header">
                <h1>Link Management</h1>
                <a type="button" class="btn btn-sm btn-secondary ml-5" href="{{ route('admin.add-links') }}">Add Link</a>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row" id="sortable">
                                    @foreach($links as $key => $link)
                                        <div class="col-12 bg-white" data-id="{{$link->id}}" data-item-sortable-id="0" draggable="true" role="option" aria-grabbed="false">
                                            <div class="row">
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="hidden" name="data[{{$key}}][id]" value="{{ $link->id }}">
                                                    <div class="form-group">
                                                        <label for="data[{{$key}}][type]">Type</label>
                                                        <select name="data[{{$key}}][type]" id="data[{{$key}}][type]" class="form-control" required>
                                                            <option value="" style="display: none">Select link type</option>
                                                            <option value="SOCIAL" {{ $link->type == \App\Models\Link::SOCIAL ? 'selected' : '' }}>SOCIAL MEDIA</option>
                                                            <option value="ORDER" {{ $link->type == \App\Models\Link::ORDER ? 'selected' : '' }}>ORDER LINK</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="data[{{$key}}][name]">Button Label</label>
                                                        <input type="text" id="data[{{$key}}][name]" name="data[{{$key}}][name]" value="{{ $link->name }}" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="data[{{$key}}][url]">URL</label>
                                                        <input type="text" id="data[{{$key}}][url]" placeholder="http://..." name="data[{{$key}}][url]" value="{{ $link->url }}" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="custom-switch">
                                                            <input type="checkbox" name="data[{{$key}}][open_new_tab]" class="custom-switch-input" {{ $link->open_new_tab == true ? 'checked' : '' }}>
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description">Open link in new tab</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-center">
                                                    <button type="button" onclick="deleteLink({{$link->id}})" class="btn btn-sm btn-danger">Remove</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-footer">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="button" onclick="document.getElementById('save-form').submit()" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form id="delete-form" action="{{ route('admin.delete-links', ['id' => '_id']) }}" method="POST">
            @csrf
        </form>
    </section>
@endsection
