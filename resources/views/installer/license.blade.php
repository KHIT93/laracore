<div class="col-md-12">
    <h2>{{ trans('installer.license.header') }}</h2>
    <p>{!! trans('installer.license.note') !!}</p>
    @include('errors._form_list')
    <hr>
    <div class="well well-sm">
        <p>The MIT License (MIT)</p>
        <p>Copyright (c) 2015 KHIT93</p>
        <p>
            Permission is hereby granted, free of charge, to any person obtaining a copy
            of this software and associated documentation files (the "Software"), to deal
            in the Software without restriction, including without limitation the rights
            to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
            copies of the Software, and to permit persons to whom the Software is
            furnished to do so, subject to the following conditions:
        </p>
        <p>
            The above copyright notice and this permission notice shall be included in all
            copies or substantial portions of the Software.
        </p>
        <p>
            THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
            IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
            FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
            AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
            LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
            OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
            SOFTWARE.
        </p>
    </div>
    <hr>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="application_license" class="checkbox" id="application_license" value="yes"> {{ trans('installer.license.accept') }}
        </label>
    </div>
</div>