@extends('main')

@section('title', 'Contact Me Page')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Me</h1>
                <hr>
                <form method="POST" action="{{url('contact')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label name="email">Email:</label>
                        <input name="email" class="form-control" id="email">                        
                    </div>
                    <div class="form-group">
                        <label name="subject">Subject:</label>
                        <input name="subject" class="form-control" id="Subject">                        
                    </div>
                    <div class="form-group">
                        <label name="message">Message:</label>
                        <textarea name="message" class="form-control" id="Message" placeholder="Type your massege here..."></textarea>                        
                    </div>
                    <input type="submit" value="Send Message" class="btn btn-success">
                </form>
                <div class="test"></div>
            </div>
        </div>
@endsection

