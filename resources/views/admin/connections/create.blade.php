@extends('_layouts.admin')

@section('content')

    <div class="container">
        <h1>
            Create a Connection
        </h1>

        <form action="{{ route('admin.connections.store') }}" method="post" class="col-xs-12" id="connectionForm">
            @csrf
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                value="{{ old('name') }}" />
                @if($errors->has('name'))
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="url">url</label>
                <input type="text" name="url" id="url" class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}"
                value="{{ old('url') }}http://parmls.rets.paragonrels.com/rets/fnisrets.aspx/PARMLS/login?rets-version=rets/1.7.2" />
                @if($errors->has('url'))
                    <span class="invalid-feedback">{{ $errors->first('url') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="username">username</label>
                <input type="text" name="username" id="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                value="{{ old('username') }}CYBERSYTES" />
                @if($errors->has('username'))
                    <span class="invalid-feedback">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="text" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                value="{{ old('password') }}94cAt35" />
                @if($errors->has('password'))
                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
            </div>

            {{-- <button class="btn btn-success mb-3 connector" style="display:block;">Connect To RETS</button> --}}

            {{-- <input type="submit" value="Create Connection" id="submitter" class="btn btn-primary"> --}}
        </form>
        <button class="btn btn-primary connector">Create Connection</button>
    </div>

@endsection

@push('scripts')

    <div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" id="loadingModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body" align="center" style="justify-content:center">
                    <div class="spinner-border text-success mb-2" style="right:50%" role="status"> <span class="sr-only">Loading...</span> </div> <h5 class="ml-2">Loading...</h5>
                </div>
            </div>
        </div>
    </div>

    <script>

    $(function(){
        $('.connector').on('click', function(){
            $('#loadingModal').modal('show')

            axios({
                method: 'post',
                url: '{{URL::to('/')}}/api/RETS-test-connection',
                params: {
                    url: $('#url').val(),
                    username: $('#username').val(),
                    password: $('#password').val()
                }
            })
            .then(function(d){
                $('#loadingModal').modal('hide')
                $('#connectionForm').submit()
                return true
            })
            .catch(function(e){
                $('#loadingModal').modal('hide')
                alert('Something went wrong!  Please check your credentials and try again.')
                return false
            })
        })
    })

    // $('.connector').on('click', function(e){
    //     e.preventDefault()
    //     var spinner = '<div class="row spinny" style="justify-content:center"> <div class="spinner-border text-success mb-2" style="right:50%" role="status"> <span class="sr-only">Loading...</span> </div> <h5 class="ml-2">Loading...</h5> </div>'
    //
    //     $('.connector').before(spinner)
    //
    //     axios({
    //         method: 'post',
    //         url: '{{URL::to('/')}}/api/RETS-test-connection',
    //         params: {
    //             url: $('#url').val(),
    //             username: $('#username').val(),
    //             password: $('#password').val()
    //         }
    //     })
    //     .then(function(vv){
    //         $('.connector').remove()
    //         $('.spinny').remove()
    //         $('#url, #username, #password').prop('disabled', true)
    //         $('#submitter').prop('disabled', false)
    //     })
    //     .catch(function(vv){
    //         $('.connector').remove()
    //         $('.spinny').remove()
    //         $('#url, #username, #password').prop('disabled', false)
    //
    //         $('#submitter').prop('disabled', true)
    //     })
    // })

    // $(function(){
    //     $('form').submit(function(){
    //         var $empty_fields = $(this).find(':input').filter(function () {
    //         return $(this).val() === '';
    //     });
    //     $empty_fields.prop('disabled', true);
    //     return true;
    //     })
    // })
    //
    // $('.connector').on('click', function(e){
    //     e.preventDefault()
    //     var spinner = '<div class="row spinny" style="justify-content:center"> <div class="spinner-border text-success mb-2" style="right:50%" role="status"> <span class="sr-only">Loading...</span> </div> <h5 class="ml-2">Loading...</h5> </div>'
    //
    //     $('.connector').before(spinner)
    //
    //     axios({
    //         method: 'post',
    //         url: '{{URL::to('/')}}/api/RETS-get-fields',
    //         data: {
    //             url: $('#url').val(),
    //             username: $('#username').val(),
    //             password: $('#password').val()
    //         }
    //     })
    //     .then(function(response){
    //         var colSize = Math.ceil(12/Object.keys(response.data).length)
    //         var htm = '<div class="row">'
    //         var options = '<option value=""></option>'
    //         options += '<option value="mls_acct">MLS#</option>'
    //         options += '<option value="status">Status</option>'
    //         options += '<option value="list_date">List Date</option>'
    //         options += '<option value="list_price">List Price</option>'
    //         options += '<option value="current_price">Current Price</option>'
    //         options += '<option value="bedrooms">Bedrooms</option>'
    //         options += '<option value="bathrooms">Bathrooms</option>'
    //         options += '<option value="area">Area</option>'
    //         options += '<option value="city">City</option>'
    //         options += '<option value="state">State</option>'
    //         options += '<option value="zip">Zip</option>'
    //         options += '<option value="sq_ft">Sq Ft</option>'
    //         options += '<option value="acreage">Acreage</option>'
    //         options += '<option value="year_built">Year Built</option>'
    //         options += '<option value="exterior_features">Exterior Features</option>'
    //         options += '<option value="interior_features">Interior Features</option>'
    //         options += '<option value="appliances">Appliances</option>'
    //         options += '<option value="zone">Zone</option>'
    //         options += '<option value="Elementary School">Elementary School</option>'
    //         options += '<option value="middle_school">Middle School</option>'
    //         options += '<option value="high_school">High School</option>'
    //         options += '<option value="waterview">Waterview</option>'
    //         options += '<option value="waterfront">Waterfront</option>'
    //         options += '<option value="utilities">Utilities</option>'
    //         options += '<option value="latitude">Latitude</option>'
    //         options += '<option value="longitude">Longitude</option>'
    //
    //         $.each(response.data, function(k, v){
    //             //console.log(k)
    //
    //             htm += '<div class="col-xs-12 col-md-'+colSize+'"><h5>'+k+'</h5>'
    //
    //             $.each(v, function(vv){
    //                 htm += '<div class="form-group"> <label for="translations['+k+']['+vv+']">'+vv+'</label> <select name="translations['+k+']['+vv+']" id="translations['+k+']['+vv+']" class="form-control">'
    //                 htm += options
    //                 htm += '</select></div>'
    //             })
    //
    //             htm +='</div>'
    //         })
    //
    //         htm += '</div>'
    //
    //         $('.connector').remove()
    //         $('.spinny').remove()
    //
    //         $('#submitter').before(htm)
    //         $('#submitter').prop('disabled', false)
    //     })
    //     .catch(function(error){
    //         $('.spinny').remove()
    //         console.log(error)
    //     })
    // })

    </script>

@endpush
