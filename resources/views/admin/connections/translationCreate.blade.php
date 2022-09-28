@extends('_layouts.admin')


@section('content')

    <div class="container">
       <h1>
           New Translation for {{ $connection->name }}
       </h1>
        <form action="" method="post">
            @csrf
            <input type="hidden" name="connection_id" value="{{ $connection->id }}">
            <div class="form-group">
                <label for="class">class</label>
                <select name="class" id="class" class="form-control {{ $errors->has('class') ? 'has-error' : '' }}">
                    <option value=""></option>
                    @foreach($classes as $class)
                        <option value="{{ $class }}">{{ $class }}</option>
                    @endforeach
                </select>
                @if($errors->has('class'))
                    <span class="invalid-feedback">{{ $errors->first('class') }}</span>
                @endif
            </div>
            
            <div id="target"></div>
            
            <input type="submit" value="Create Translation" class="btn btn-primary">
        </form>
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
         })
        $(function(){            
            $('form').submit(function(){
                var $empty_fields = $(this).find(':input').filter(function () {
                    return $(this).val() === '';
                });
                $empty_fields.prop('disabled', true);
                return true;
            })
            
            var data = {
                '': '',
                'mls_acct': 'MLS Number',
                'status': 'Status',
                'list_date': 'List Date',
                'list_price': 'List Price',
                'current_price': 'Current Price',
                'last_updated': 'Last Updated',
                'description': 'Description',
                'bedrooms': 'Bedrooms',
                'bathrooms': 'Bathrooms',
                'area': 'Area',
                'address_number': 'Address Number',
                'address_street': 'Address Street',
                'unit_number': 'Unit Number',
                'city': 'City',
                'state': 'State',
                'zip': 'Zip code',
                'sq_ft': 'Sq Ft',
                'acreage': 'Acreage',
                'year_built': 'Year Built',
                'exterior_features': 'Exterior Features',
                'interior_features': 'Interior Features',
                'appliances': 'Appliances',
                'zone': 'Zone',
                'elementary_school': 'Elementary School',
                'middle_school': 'Middle School',
                'high_school': 'High School',
                'waterview': 'Waterview',
                'waterfront': 'Waterfront',
                'utilities': 'Utilities',
                'latitude': 'Latitude',
                'longitude': 'Longitude'
            }
            
            $('#class').on('change', function(){
                $('#loadingModal').modal('show')
                
                $('#target').empty()
                
                axios({
                    url: '{{ URL::to('/') }}/api/RETS-get-fields',
                    method: 'post',
                    data: {
                        url: '{{ $connection->url }}',
                        username: '{{ $connection->username }}',
                        password: '{{ $connection->password }}',
                        class: $('#class').val()
                    }
                })
                .then(function(response){
                    var htm = $('<div />', {class: 'form-row'})
                    $.each(response.data, function(k, v){
                        var cont = $('<div />', {class: 'col-4'})
                        $('<label />', {for: k}).text(k).appendTo(cont)
                        var sel = $('<select />', {name: k, class: 'form-control mb-2', id: k})
                        
                        for(var val in data)
                        {
                            $('<option />', {value: val, text: data[val]}).appendTo(sel)
                        }
                        
                        sel.appendTo(cont)
                        cont.appendTo(htm)
                        
                    })
                    htm.appendTo($('#target'))
                    $('#loadingModal').modal('hide')
                })
            })
        })
    </script>

@endpush