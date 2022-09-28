@extends('_layouts.admin')


@section('content')

    <div class="container">
        <h1>Properties</h1>
        <div class="row row-cols-1 row-cols-md-4">
            @foreach($properties as $property)
                <div class="col mb-4">
                    <div class="card" data-toggle="modal" data-target="#settingsModal" data-kittnens="{{ $property->_id }}">
                        <img data-src="{{ @$property->photos[0]['location'] }}" onerror="this.src='https://via.placeholder.com/350'" class="lazy card-img-top" style="height: 180px;">
                        <div class="card-body">
                            <h5 class="card-title">MLS# {{ $property->mls_acct }}</h5>
                            <p class="card-text">Card Text</p>
                            <p class="card-text"><small class="text-muted">
                                <ul style="list-style: none;">
                                    <li>List Date: </li>
                                    <li>Current Price: </li>
                                    <li>Last Updated: </li>
                                    <li>Association: {{ $property->association }}</li>
                                </ul>
                            </small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            {{ $properties->appends($_GET)->links() }}
        </div>
    </div>

@endsection


@push('scripts')

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
    <script>
        $('.lazy').Lazy({
            scrollDirection: 'vertical',
            Effect: 'fadeIn',
            visibleOnly: true,
            effectTime: 250
        })
        
        $(function(){
            $('#settingsModal').on('show.bs.modal', function (event) {
                var prop = $(event.relatedTarget)
                var modal = $(this)
                console.log(event.relatedTarget.kittnens)
                return false
                axios({
                    method: 'get',
                    url: '{{URL::to('/')}}/api/prop',
                    params: {
                        object_id: prop.object_id
                    }
                })
                .then(function(stats, data){
                    console.log(data)
                    modal.find('#association-target').text(data.association)
                    modal.find('#mls-target').text(data.mls_acct)
                })
                .catch(function(error){
                    console.log('oops: '+error)
                })
            })
        })
    </script>
    
    <!-- Modal -->
    <div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Settings for <span id="association-target"></span> - <span id="mls-target"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-check">
                        <input class="form-check-input" name="featured" type="checkbox" value="" id="featured">
                        <label class="form-check-label" for="featured">
                            Featured Property
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="visibility" type="checkbox" value="none" id="visibility">
                        <label class="form-check-label" for="visibility">
                            Hide in Feed
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endpush