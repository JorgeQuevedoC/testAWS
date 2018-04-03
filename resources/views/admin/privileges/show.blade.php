@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ strtoupper($privilege->privilege) }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/privileges') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/privileges/' . $privilege->id . '/edit') }}" title="Edit Privilege"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        @if (is_null(App\User::privilegeInUse($privilege->id)->first()))
                        <form method="POST" action="{{ url('admin/privileges' . '/' . $privilege->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Privilege" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        @endif
                        <br/>
                        <br/>

                        @php 
                            $enrolledPolicies = App\Policy::select('policy')->where($privilege->role_header, '1')->paginate(16);
                            $counter = 0;
                        @endphp

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th> Role </th>
                                        <td> {{ strtoupper($privilege->privilege) }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <br>
                        <br>
                                    
                        <div class="table-responsive">
                            <table class="table table-striped" style="">
                                <thead class="thead-dark">
                                    <tr>
                                        <th colspan="2" style="text-align:center;">Policies</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($enrolledPolicies as $policies)
                                    @if (($counter%2)==0)
                                    <tr>
                                        <td>{{ $policies->policy }}</td>                                                   
                                    @else
                                        <td>{{ $policies->policy }}</td>
                                    </tr>    
                                    @endif
                                    @php $counter = $counter+1; @endphp
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $enrolledPolicies->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>                                                   

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
