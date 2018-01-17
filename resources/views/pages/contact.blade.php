@extends('main')

@section('title', 'Contact Me Page')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Me</h1>
                <hr>
                <form>
                    <div class="form-group">
                        <label name="email">Email:</label>
                        <input name="email" class="form-control" id="email">                        
                    </div>
                    <div class="form-group">
                        <label name="Subject">Subject:</label>
                        <input name="Subject" class="form-control" id="Subject">                        
                    </div>
                    <div class="form-group">
                        <label name="Message">Message:</label>
                        <textarea name="Message" class="form-control" id="Message" placeholder="Type your massege here..."></textarea>                        
                    </div>
                    <input type="Subject" value="Send Message" class="btn btn-success">
                </form>
                <div class="test"></div>
            </div>
        </div>
@endsection

