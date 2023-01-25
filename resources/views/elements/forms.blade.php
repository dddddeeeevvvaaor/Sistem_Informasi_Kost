@extends('layouts.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Forms</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Forms</h6>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Default</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" placeholder="Regular" class="form-control" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-4">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control" placeholder="Search" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-4">
                                    <input class="form-control" placeholder="Birthday" type="text">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <input type="text" placeholder="Success" class="form-control is-valid" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-danger">
                                <input type="email" placeholder="Error Input" class="form-control is-invalid" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Alternative</h6>
            </div>
            <div class="card-body">
                <div class="p-4 bg-secondary">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Regular" class="form-control form-control-alternative" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-4">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        <input class="form-control form-control-alternative" placeholder="Search" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-4">
                                        <input class="form-control" placeholder="Birthday" type="text">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <input type="text" placeholder="Success" class="form-control form-control-alternative is-valid" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-danger">
                                    <input type="email" placeholder="Error Input" class="form-control form-control-alternative is-invalid" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Form Controls</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-select" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Example multiple select</label>
                        <select multiple class="form-select" id="exampleFormControlSelect2">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>HTML 5 Inputs</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Text</label>
                        <input class="form-control" type="text" value="John Snow" id="example-text-input">
                    </div>
                    <div class="form-group">
                        <label for="example-search-input" class="form-control-label">Search</label>
                        <input class="form-control" type="search" value="Tell me your secret ..." id="example-search-input">
                    </div>
                    <div class="form-group">
                        <label for="example-email-input" class="form-control-label">Email</label>
                        <input class="form-control" type="email" value="@example.com" id="example-email-input">
                    </div>
                    <div class="form-group">
                        <label for="example-url-input" class="form-control-label">URL</label>
                        <input class="form-control" type="url" value="" id="example-url-input">
                    </div>
                    <div class="form-group">
                        <label for="example-tel-input" class="form-control-label">Phone</label>
                        <input class="form-control" type="tel" value="40-(770)-888-444" id="example-tel-input">
                    </div>
                    <div class="form-group">
                        <label for="example-password-input" class="form-control-label">Password</label>
                        <input class="form-control" type="password" value="password" id="example-password-input">
                    </div>
                    <div class="form-group">
                        <label for="example-number-input" class="form-control-label">Number</label>
                        <input class="form-control" type="number" value="23" id="example-number-input">
                    </div>
                    <div class="form-group">
                        <label for="example-datetime-local-input" class="form-control-label">Datetime</label>
                        <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00" id="example-datetime-local-input">
                    </div>
                    <div class="form-group">
                        <label for="example-date-input" class="form-control-label">Date</label>
                        <input class="form-control" type="date" value="2018-11-23" id="example-date-input">
                    </div>
                    <div class="form-group">
                        <label for="example-month-input" class="form-control-label">Month</label>
                        <input class="form-control" type="month" value="2018-11" id="example-month-input">
                    </div>
                    <div class="form-group">
                        <label for="example-week-input" class="form-control-label">Week</label>
                        <input class="form-control" type="week" value="2018-W23" id="example-week-input">
                    </div>
                    <div class="form-group">
                        <label for="example-time-input" class="form-control-label">Time</label>
                        <input class="form-control" type="time" value="10:30:00" id="example-time-input">
                    </div>
                    <div class="form-group">
                        <label for="example-color-input" class="form-control-label">Color</label>
                        <input class="form-control" type="color" value="#5e72e4" id="example-color-input">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Sizing</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Default input">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Sizing</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <select class="form-select form-select-lg">
                            <option>Large select</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-select">
                            <option>Default select</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-select form-select-sm">
                            <option>Small select</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Checkbox</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="fcustomCheck1" checked="">
                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="fcustomCheck1">
                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Radios</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio1">
                        <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio2">
                        <label class="custom-control-label" for="customRadio2">Or toggle this custom radio</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Disabled</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="customCheckDisabled" disabled>
                        <label class="custom-control-label" for="customCheckDisabled">Check this custom checkbox</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" id="radio3" name="radioDisabled" id="customRadioDisabled" class="form-check-input" disabled>
                        <label class="custom-control-label" for="customRadioDisabled">Toggle this custom radio</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Toogles</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Checked switch</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Disabled switch</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection