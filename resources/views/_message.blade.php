<style type="text/css">

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert h4 {
    margin-top: 0;
    color: inherit;
}

.alert .alert-link {
    font-weight: bold;
}

.alert > p,
.alert > ul {
    margin-bottom: 0;
}

.alert > p + p {
    margin-top: 5px;
}

.alert dismissible {
    padding-right: 35px;
}

.alert-dismissible .close {
    position: relative;
    top: -2px;
    right: -21px;
    color: inherit;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-success hr {
    border-top-color: #c3e6cb;
}

.alert-success .alert-link {
    color: #0b2e13;
}

.alert-info {
    color: #0c5460;
    background-color: #d1ecf1;
    border-color: #bee5eb;
}

.alert-info hr {
    border-top-color: #bee5eb;
}

.alert-info .alert-link {
    color: #062c33;
}

.alert-warning {
    color: #856404;
    background-color: #fff3cd;
    border-color: #ffeeba;
}

.alert-warning hr {
    border-top-color: #ffeeba;
}

.alert-warning .alert-link {
    color: #533f03;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.alert-danger hr {
    border-top-color: #f5c6cb;
}

.alert-danger .alert-link {
    color: #491217;
}

</style>

@if(!empty(session('success')))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (!empty(session('error')))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif