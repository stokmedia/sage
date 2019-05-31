{{--
  Template Name: Bootstrap Styleguide Template
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
@include('partials.page-header')

<div class="container-fluid">

  <!-- Buttons ================================================== -->
  <div class="bs-docs-section">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h2 id="buttons">Buttons</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <p class="bs-component">
          <h3 class="mb-0"mall</h3>
          <button class="btn btn-sm btn-primary" type="button">Call to action</button>
          <button class="btn btn-sm btn-outline-primary" type="button">Call to action</button>
          <a class="btn btn-sm btn-link" href="#" role="button">Call to action</a>
        </p>

        <p class="bs-component">
          <h3>Normal</h3>
          <button class="btn btn-primary" type="button">CALL TO ACTION</button>
          <button class="btn btn-outline-primary" type="button">CALL TO ACTION</button>
          <a class="btn btn-link" href="#" role="button">CALL TO ACTION</a>
        </p>

        <p class="bs-component">
          <h3>Large</h3>
          <button class="btn btn-lg btn-primary" type="button">CALL TO ACTION</button>
          <button class="btn btn-lg btn-outline-primary" type="button">CALL TO ACTION</button>
          <a class="btn btn-lg btn-link" href="#" role="button">CALL TO ACTION</a>
          <div class="breadcrumb d-inline-block">
            <a class="breadcrumb-item" href="#">Home</a>
            <a class="breadcrumb-item" href="#">Level 2</a>
            <span class="breadcrumb-item active">Level 3</span>
          </div>
        </p>
      </div>
    </div>
  </div>
  <br />
  <!-- Buttons ================================================== -->

  <!-- Dropdown ================================================== -->
  <div class="bs-docs-section">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h2 id="buttons">Dropdown</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <p class="bs-component">
          <div class="form-group">
            <div class="dropdown d-inline-block">
              <button class="btn btn-lg btn-outline-primary dropdown-toggle text-left" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
              </button>
              <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="#">Option One</a>
                <a class="dropdown-item disabled" href="#">Disabled action</a>
              </div>
            </div>
          </div>
        </p>
      </div>
    </div>
  </div>
  <br />
  <!-- Dropdown ================================================== -->

  <!-- Inputs ================================================== -->
  <div class="bs-docs-section">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h2 id="buttons">Input</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <p class="bs-component">
          <h3 class="mb-0">Normal</h3>
          <div class="form-group">
            <input type="text" class="form-control form-control-lg" placeholder="HINT">
          </div>

          <h3 class="mb-0">Has error</h3>
          <div class="form-group">
            <input type="text" class="form-control form-control-lg is-invalid">
            <div class="invalid-feedback">
              Your email is not valid
            </div>
          </div>

        </p>
      </div>
    </div>
  </div>
  <br />
  <!-- Inputs ================================================== -->

  <!-- Custom Forms ================================================== -->
  <div class="bs-docs-section">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h2 id="buttons">Custom forms</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <p class="bs-component">
          <div class="bs-component">
            <fieldset>
              <div class="form-group">
                <div class="custom-control custom-radio d-inline-block">
                  <input id="customRadio1" class="custom-control-input" name="customRadio" type="radio" checked>
                  <label class="custom-control-label" for="customRadio1"></label>
                </div>
                <div class="custom-control custom-radio d-inline-block"><input id="customRadio3" class="custom-control-input" disabled="disabled" name="customRadio" type="radio">
                  <label class="custom-control-label" for="customRadio3"></label>
                </div>
              </div>

              <div class="form-group">
                <div class="custom-control custom-radio">
                  <input id="customRadio2" class="custom-control-input" name="customRadio" type="radio" checked>
                  <label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label>
                </div>
                <div class="custom-control custom-radio"><input id="customRadio3" class="custom-control-input" disabled="disabled" name="customRadio" type="radio">
                  <label class="custom-control-label" for="customRadio3">Disabled custom radio</label>
                </div>
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox d-inline-block">
                  <input id="customCheck01" class="custom-control-input" checked="checked" type="checkbox">
                  <label class="custom-control-label" for="customCheck01"></label>
                </div>
                <div class="custom-control custom-checkbox d-inline-block">
                  <input id="customCheck02" class="custom-control-input" disabled="disabled" type="checkbox">
                  <label class="custom-control-label" for="customCheck02"></label>
                </div>
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox"><input id="customCheck1" class="custom-control-input"
                    checked="checked" type="checkbox">
                  <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label></div>
                <div class="custom-control custom-checkbox"><input id="customCheck2" class="custom-control-input"
                    disabled="disabled" type="checkbox">
                  <label class="custom-control-label" for="customCheck2">Disabled custom checkbox</label></div>
              </div>
              <div class="form-group">
                <div class="custom-control custom-switch"><input id="customSwitch1" class="custom-control-input" checked="checked"
                    type="checkbox">
                  <label class="custom-control-label" for="customSwitch1">Toggle this Switch element</label></div>
                <div class="custom-control custom-switch"><input id="customSwitch2" class="custom-control-input"
                    disabled="disabled" type="checkbox">
                  <label class="custom-control-label" for="customSwitch2">Disabled Switch element</label></div>
              </div>
              <div class="form-group"><select class="custom-select">
                  <option selected="selected">Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select></div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="custom-file"><input id="inputGroupFile02" class="custom-file-input" type="file">
                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label></div>
                  <div class="input-group-append"><span id="" class="input-group-text">Upload</span></div>
                </div>
              </div>
            </fieldset>
          </div>

        </p>
      </div>
    </div>
  </div>
  <br />
  <!-- Custom Forms ================================================== -->


  <!-- Typography ================================================== -->
  <div class="bs-docs-section">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-header">
          <h2 id="typography">Typography</h2>
        </div>
      </div>
    </div>
    <!-- Headings -->
    <div class="row">
      <div class="col-sm-12">
        <h5>Header</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="bs-component">
          <h1>H1. This is a very large header</h1>
          <h2>H2. This is a large header</h2>
          <h3>H3. This is a medium header</h3>
          <h4>H4. This is a moderate header</h4>
          <h5>H5. This is a small header</h5>
        </div>
      </div>
    </div>
    <br />
    <!-- Paragraph -->
    <div class="row">
      <div class="col-sm-12">
        <h5>Paragraph</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="bs-component">
          <p>In hac habitasse platea dictumst. <em>Vivamus adipiscing fermentum quam volutpat aliquam.</em> Integer et
            elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem
            tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at
            nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat aliquam. Integer et elit
            eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem
            tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at
            nibh quis, facilisis accumsan turpis.</p>
        </div>
      </div>
    </div>
    <br />
    <!-- Preamble -->
    <div class="row">
      <div class="col-sm-12">
        <h5>Preamble</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="bs-component">
          <p><em>In hac habitasse platea disctumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit
              eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem
              tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula
              at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat aliquam. Integer et
              elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem
              tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula
              at nibh quis, facilisis accumsan turpis.</em></p>
        </div>
      </div>
    </div>
    <br />
    <!-- Blockquote -->
    <div class="row">
      <div class="col-sm-12">
        <h5>Blockquote</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="bs-component">
          <blockquote>
            In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget
            elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper
            <footer>Erik Björkgren, Grundare av OneLab</footer>
          </blockquote>
        </div>
      </div>
    </div>
    <br />
    <!-- Small -->
    <div class="row">
      <div class="col-sm-12">
        <h5>Small</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="bs-component">
          <p><small>In hac habitasse platea disctumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et
              elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem
              tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula
              at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat aliquam. Integer et
              elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem
              tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula
              at nibh quis, facilisis accumsan turpis.</small></p>
        </div>
      </div>
    </div>
  </div>
  <br />
  <br />
  <!-- Forms ================================================== -->
  <div class="bs-docs-section">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-header">
          <h2 id="forms">Forms</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="bs-component">
          <form>
            <fieldset>
              <legend>Legend</legend>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="staticEmail">Email</label>
                <div class="col-sm-10">
                  <input id="staticEmail" class="form-control-plaintext" readonly="readonly" type="text" value="email@example.com" />
                </div>
              </div>
              <div class="form-group"><label for="exampleInputEmail1">Email address</label>
                <input id="exampleInputEmail1" class="form-control" type="email" placeholder="Enter email" aria-describedby="emailHelp" />
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group"><label for="exampleInputPassword1">Password</label>
                <input id="exampleInputPassword1" class="form-control" type="password" placeholder="Password" /></div>
              <div class="form-group">
                <label for="exampleSelect1">Example select</label>
                <select id="exampleSelect1" class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleSelect2">Example multiple select</label>
                <select id="exampleSelect2" class="form-control" multiple="multiple">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleTextarea">Example textarea</label>
                <textarea id="exampleTextarea" class="form-control" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input id="exampleInputFile" class="form-control-file" type="file" aria-describedby="fileHelp" />
                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for  the above input. It is a bit lighter and easily wraps to a new line.</small>
              </div>
              <fieldset class="form-group">
                <legend>Radio buttons</legend>
                <div class="form-check"><label class="form-check-label">
                    <input id="optionsRadios1" class="form-check-input" checked="checked" name="optionsRadios" type="radio" value="option1" />
                    Option one is this and that—be sure to include why it's great
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input id="optionsRadios2" class="form-check-input" name="optionsRadios" type="radio" value="option2" />
                    Option two can be something else and selecting it will deselect option one
                  </label>
                </div>
                <div class="form-check disabled">
                  <label class="form-check-label">
                    <input id="optionsRadios3" class="form-check-input" disabled="disabled" name="optionsRadios" type="radio" value="option3" />
                    Option three is disabled
                  </label>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <legend>Checkboxes</legend>
                <div class="form-check"><label class="form-check-label">
                    <input class="form-check-input" checked="checked" type="checkbox" value="" />
                    Option one is this and that—be sure to include why it's great
                  </label></div>
                <div class="form-check disabled"><label class="form-check-label">
                    <input class="form-check-input" disabled="disabled" type="checkbox" value="" />
                    Option two is disabled
                  </label></div>
              </fieldset>
              <button class="btn btn-primary" type="submit">Submit</button>
            </fieldset>
          </form>
        </div>
      </div>
      <div class="col-sm-4 offset-lg-1">
        <form class="bs-component">
          <div class="form-group">
            <fieldset disabled="disabled"><label class="control-label" for="disabledInput">Disabled input</label>
              <input id="disabledInput" class="form-control" disabled="disabled" type="text"
                placeholder="Disabled input here..." /></fieldset>
          </div>
          <div class="form-group">
            <fieldset><label class="control-label" for="readOnlyInput">Readonly input</label>
              <input id="readOnlyInput" class="form-control" readonly="readonly" type="text"
                placeholder="Readonly input here…" /></fieldset>
          </div>
          <div class="form-group has-success"><label class="form-control-label" for="inputSuccess1">Valid input</label>
            <input id="inputValid" class="form-control is-valid" type="text" value="correct value" />
            <div class="valid-feedback">Success! You've done it.</div>
          </div>
          <div class="form-group has-danger"><label class="form-control-label" for="inputDanger1">Invalid input</label>
            <input id="inputInvalid" class="form-control is-invalid" type="text" value="wrong value" />
            <div class="invalid-feedback">Sorry, that username's taken. Try another?</div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="bs-component">
                <p>In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis.</p>
              </div>
            </div>
          </div>
          <div class="form-group"><label class="col-form-label" for="inputDefault">Default input</label>
            <input id="inputDefault" class="form-control" type="text" placeholder="Default input" /></div>
          <div class="form-group"><label class="col-form-label col-form-label-sm" for="inputSmall">Small input</label>
            <input id="inputSmall" class="form-control form-control-sm" type="text" placeholder=".form-control-sm" />
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="bs-component">
                <p><em>In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis.</em></p>
              </div>
            </div>
          </div>
        </form>
        <div class="bs-component">
          <fieldset>
            <legend>Custom forms</legend>
            <div class="form-group">
              <div class="custom-control custom-radio"><input id="customRadio1" class="custom-control-input"
                  checked="checked" name="customRadio" type="radio" />
                <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label></div>
              <div class="custom-control custom-radio"><input id="customRadio2" class="custom-control-input"
                  name="customRadio" type="radio" />
                <label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label></div>
              <div class="custom-control custom-radio"><input id="customRadio3" class="custom-control-input"
                  disabled="disabled" name="customRadio" type="radio" />
                <label class="custom-control-label" for="customRadio3">Disabled custom radio</label></div>
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox"><input id="customCheck1" class="custom-control-input"
                  checked="checked" type="checkbox" />
                <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label></div>
              <div class="custom-control custom-checkbox"><input id="customCheck2" class="custom-control-input"
                  disabled="disabled" type="checkbox" />
                <label class="custom-control-label" for="customCheck2">Disabled custom checkbox</label></div>
            </div>
            <div class="form-group">
              <div class="custom-control custom-switch"><input id="customSwitch1" class="custom-control-input"
                  checked="checked" type="checkbox" />
                <label class="custom-control-label" for="customSwitch1">Toggle this Switch element</label></div>
              <div class="custom-control custom-switch"><input id="customSwitch2" class="custom-control-input"
                  disabled="disabled" type="checkbox" />
                <label class="custom-control-label" for="customSwitch2">Disabled Switch element</label></div>
            </div>
            <div class="form-group"><select class="custom-select">
                <option selected="selected">Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select></div>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="custom-file"><input id="inputGroupFile02" class="custom-file-input" type="file" />
                  <label class="custom-file-label" for="inputGroupFile02">Choose file</label></div>
                <div class="input-group-append"><span id="" class="input-group-text">Upload</span></div>
              </div>
            </div>
          </div>
          <br />
          <!-- Unorder & Ordered List -->
          <div class="row">
            <div class="col-sm-12">
              <h5>Unorder & Ordered List</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="bs-component">
                <ul>
                  <li>Cras justo odio</li>
                  <li>Dapibus ac facilisis in</li>
                  <li>Morbi leo risus</li>
                  <li>Porta ac consectetur ac</li>
                  <li>Vestibulum at eros</li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="bs-component">
                <ol>
                  <li>Cras justo odio</li>
                  <li>Dapibus ac facilisis in</li>
                  <li>Morbi leo risus</li>
                  <li>Porta ac consectetur ac</li>
                  <li>Vestibulum at eros</li>
                </ol>
              </div>
            </div>
          </div>
          <br />
          <!-- Text Sample -->
          <div class="row justify-content-center">
            <div class="col-sm-12">
              <h5>Blockquote</h5>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-12">
              <div class="bs-component">
                <p><em>In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis.</em></p>
                <blockquote>
                  In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper
                  <footer>Erik Björkgren, Grundare av OneLab</footer>
                </blockquote>
                <p>In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br />
  <br />
  <!-- Navs ================================================== -->
  <div class="bs-docs-section">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-header">
          <h2 id="navs">Navs</h2>
        </div>
      </div>
    </div>
    <div class="row" style="margin-bottom: 2rem;">
      <div class="col-sm-6">
        <h2 id="nav-tabs">Tabs</h2>
        <div class="bs-component">
          <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" href="#home" data-toggle="tab">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#profile" data-toggle="tab">Profile</a></li>
            <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" href="#"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
              <div class="dropdown-menu"><a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>

              </div>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div id="home" class="tab-pane fade show active">

              Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro
              synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
              butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex
              squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher
              voluptate nisi qui.

            </div>
            <div id="profile" class="tab-pane fade">

              Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation
              +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
              craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts
              ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.

            </div>
            <div id="dropdown1" class="tab-pane fade">

              Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro
              fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone
              skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings
              gentrify squid 8-bit cred pitchfork.

            </div>
            <div id="dropdown2" class="tab-pane fade">

              Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master
              cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party
              locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before
              they sold out farm-to-table VHS viral locavore cosby sweater.

            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <h2 id="nav-pills">Pills</h2>
        <div class="bs-component">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" href="#"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
              <div class="dropdown-menu"><a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>

              </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
            <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
          </ul>
        </div>
        &nbsp;
        <div class="bs-component">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" href="#"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
              <div class="dropdown-menu"><a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>

              </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
            <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h2 id="nav-breadcrumbs">Breadcrumbs</h2>
        <div class="bs-component">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
          </ol>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Library</li>
          </ol>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active">Data</li>
          </ol>
        </div>
      </div>
      <div class="col-sm-6">
        <h2 id="pagination">Pagination</h2>
        <div class="bs-component">
          <div>
            <ul class="pagination">
              <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
          </div>
          <div>
            <ul class="pagination pagination-lg">
              <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
          </div>
          <div>
            <ul class="pagination pagination-sm">
              <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br />
  <br />
  <!-- Indicators ================================================== -->
  <div class="bs-docs-section">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-header">
          <h2 id="indicators">Indicators</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <h2>Alerts</h2>
        <div class="bs-component">
          <div class="alert alert-dismissible alert-warning">

            <button class="close" type="button" data-dismiss="alert">×</button>
            <h4 class="alert-heading">Warning!</h4>
            <p class="mb-0">Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue.
              Praesent commodo cursus magna, <a class="alert-link" href="#">vel scelerisque nisl consectetur et</a>.</p>

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="bs-component">
          <div class="alert alert-dismissible alert-danger"><button class="close" type="button"
              data-dismiss="alert">×</button>
            <strong>Oh snap!</strong> <a class="alert-link" href="#">Change a few things up</a> and try submitting
            again.</div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="bs-component">
          <div class="alert alert-dismissible alert-success"><button class="close" type="button"
              data-dismiss="alert">×</button>
            <strong>Well done!</strong> You successfully read <a class="alert-link" href="#">this important alert
              message</a>.</div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="bs-component">
          <div class="alert alert-dismissible alert-info"><button class="close" type="button"
              data-dismiss="alert">×</button>
            <strong>Heads up!</strong> This <a class="alert-link" href="#">alert needs your attention</a>, but it's not
            super important.</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="bs-component">
          <div class="alert alert-dismissible alert-primary"><button class="close" type="button"
              data-dismiss="alert">×</button>
            <strong>Oh snap!</strong> <a class="alert-link" href="#">Change a few things up</a> and try submitting
            again.</div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="bs-component">
          <div class="alert alert-dismissible alert-secondary"><button class="close" type="button"
              data-dismiss="alert">×</button>
            <strong>Well done!</strong> You successfully read <a class="alert-link" href="#">this important alert
              message</a>.</div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="bs-component">
          <div class="alert alert-dismissible alert-light"><button class="close" type="button"
              data-dismiss="alert">×</button>
            <strong>Heads up!</strong> This <a class="alert-link" href="#">alert needs your attention</a>, but it's not
            super important.</div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('partials.content-page')
@endwhile
@endsection
