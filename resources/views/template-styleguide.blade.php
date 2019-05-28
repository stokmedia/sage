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
            <div class="col-sm-8">
              <p class="bs-component"><button class="btn btn-primary" type="button">Primary</button>
                <button class="btn btn-secondary" type="button">Secondary</button>
                <button class="btn btn-success" type="button">Success</button>
                <button class="btn btn-info" type="button">Info</button>
                <button class="btn btn-warning" type="button">Warning</button>
                <button class="btn btn-danger" type="button">Danger</button>
                <button class="btn btn-link" type="button">Link</button></p>
              <p class="bs-component"><button class="btn btn-primary disabled" type="button">Primary</button>
                <button class="btn btn-secondary disabled" type="button">Secondary</button>
                <button class="btn btn-success disabled" type="button">Success</button>
                <button class="btn btn-info disabled" type="button">Info</button>
                <button class="btn btn-warning disabled" type="button">Warning</button>
                <button class="btn btn-danger disabled" type="button">Danger</button>
                <button class="btn btn-link disabled" type="button">Link</button></p>
              <p class="bs-component"><button class="btn btn-outline-primary" type="button">Primary</button>
                <button class="btn btn-outline-secondary" type="button">Secondary</button>
                <button class="btn btn-outline-success" type="button">Success</button>
                <button class="btn btn-outline-info" type="button">Info</button>
                <button class="btn btn-outline-warning" type="button">Warning</button>
                <button class="btn btn-outline-danger" type="button">Danger</button></p>

              <div class="bs-component">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                  <button class="btn btn-primary" type="button">Primary</button>
                  <div class="btn-group" role="group">

                    &nbsp;
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="#">Dropdown
                        link</a>
                      <a class="dropdown-item" href="#">Dropdown link</a></div>
                  </div>
                </div>
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                  <button class="btn btn-success" type="button">Success</button>
                  <div class="btn-group" role="group">

                    &nbsp;
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop2"><a class="dropdown-item" href="#">Dropdown
                        link</a>
                      <a class="dropdown-item" href="#">Dropdown link</a></div>
                  </div>
                </div>
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                  <button class="btn btn-info" type="button">Info</button>
                  <div class="btn-group" role="group">

                    &nbsp;
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop3"><a class="dropdown-item" href="#">Dropdown
                        link</a>
                      <a class="dropdown-item" href="#">Dropdown link</a></div>
                  </div>
                </div>
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                  <button class="btn btn-danger" type="button">Danger</button>
                  <div class="btn-group" role="group">

                    &nbsp;
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop4"><a class="dropdown-item" href="#">Dropdown
                        link</a>
                      <a class="dropdown-item" href="#">Dropdown link</a></div>
                  </div>
                </div>
              </div>
              <div class="bs-component"><button class="btn btn-primary btn-lg" type="button">Large button</button>
                <button class="btn btn-primary" type="button">Default button</button>
                <button class="btn btn-primary btn-sm" type="button">Small button</button></div>
            </div>
            <div class="col-sm-4">
              <div class="bs-component" style="margin-bottom: 15px;">
                <div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="btn btn-primary active">
                    <input autocomplete="off" checked="checked" type="checkbox" /> Active
                  </label>
                  <label class="btn btn-primary">
                    <input autocomplete="off" type="checkbox" /> Check
                  </label>
                  <label class="btn btn-primary">
                    <input autocomplete="off" type="checkbox" /> Check
                  </label></div>
              </div>
              <div class="bs-component" style="margin-bottom: 15px;">
                <div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="btn btn-primary active">
                    <input id="option1" autocomplete="off" checked="checked" name="options" type="radio" /> Active
                  </label>
                  <label class="btn btn-primary">
                    <input id="option2" autocomplete="off" name="options" type="radio" /> Radio
                  </label>
                  <label class="btn btn-primary">
                    <input id="option3" autocomplete="off" name="options" type="radio" /> Radio
                  </label></div>
              </div>
              <div class="bs-component" style="margin-bottom: 15px;">
                <div class="btn-group" role="group" aria-label="Basic example"><button class="btn btn-secondary"
                    type="button">Left</button>
                  <button class="btn btn-secondary" type="button">Middle</button>
                  <button class="btn btn-secondary" type="button">Right</button></div>
              </div>
              <div class="bs-component" style="margin-bottom: 15px;">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group mr-2" role="group" aria-label="First group"><button class="btn btn-secondary"
                      type="button">1</button>
                    <button class="btn btn-secondary" type="button">2</button>
                    <button class="btn btn-secondary" type="button">3</button>
                    <button class="btn btn-secondary" type="button">4</button></div>
                  <div class="btn-group mr-2" role="group" aria-label="Second group"><button class="btn btn-secondary"
                      type="button">5</button>
                    <button class="btn btn-secondary" type="button">6</button></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Navbar ================================================== -->
        <div class="bs-docs-section clearfix">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">
                <h2 id="navbars">Navbars</h2>
              </div>
              <div class="bs-component">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary"><a class="navbar-brand" href="#">Navbar</a>
                  <div id="navbarColor01" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0"><input class="form-control mr-sm-2" type="text"
                        placeholder="Search" />
                      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button></form>
                  </div>
                </nav>
              </div>
              <div class="bs-component">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark"><a class="navbar-brand" href="#">Navbar</a>
                  <div id="navbarColor02" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0"><input class="form-control mr-sm-2" type="text"
                        placeholder="Search" />
                      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button></form>
                  </div>
                </nav>
              </div>
              <div class="bs-component">
                <nav class="navbar navbar-expand-lg navbar-light bg-light"><a class="navbar-brand" href="#">Navbar</a>
                  <div id="navbarColor03" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0"><input class="form-control mr-sm-2" type="text"
                        placeholder="Search" />
                      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button></form>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
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
            <div class="col-sm-4">
              <div class="bs-component">
                <h1>Heading 1</h1>
                <h2>Heading 2</h2>
                <h3>Heading 3</h3>
                <h4>Heading 4</h4>
                <h5>Heading 5</h5>
                <h6>Heading 6</h6>
                <h3>Heading
                  <small class="text-muted">with muted text</small></h3>
                <p class="lead">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>

              </div>
            </div>
            <div class="col-sm-4">
              <div class="bs-component">
                <h2>Example body text</h2>
                Nullam quis risus eget <a href="#">urna mollis ornare</a> vel eu leo. Cum sociis natoque penatibus et
                magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.

                <small>This line of text is meant to be treated as fine print.</small>

                The following is <strong>rendered as bold text</strong>.

                The following is <em>rendered as italicized text</em>.

                An abbreviation of the word attribute is <abbr title="attribute">attr</abbr>.

              </div>
            </div>
            <div class="col-sm-4">
              <div class="bs-component">
                <h2>Emphasis classes</h2>
                <p class="text-muted">Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.</p>
                <p class="text-primary">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p class="text-secondary">Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
                <p class="text-warning">Etiam porta sem malesuada magna mollis euismod.</p>
                <p class="text-danger">Donec ullamcorper nulla non metus auctor fringilla.</p>
                <p class="text-success">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                <p class="text-info">Maecenas sed diam eget risus varius blandit sit amet non magna.</p>

              </div>
            </div>
          </div>
          <!-- Blockquotes -->
          <div class="row">
            <div class="col-sm-12">
              <h2 id="type-blockquotes">Blockquotes</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="bs-component">
                <blockquote class="blockquote">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>

                  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="bs-component">
                <blockquote class="blockquote text-center">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>

                  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="bs-component">
                <blockquote class="blockquote text-right">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>

                  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
        <!-- Tables ================================================== -->
        <div class="bs-docs-section">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">
                <h2 id="tables">Tables</h2>
              </div>
              <div class="bs-component">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Type</th>
                      <th scope="col">Column heading</th>
                      <th scope="col">Column heading</th>
                      <th scope="col">Column heading</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="table-active">
                      <th scope="row">Active</th>
                      <td>Column content</td>
                      <td>Column content</td>
                      <td>Column content</td>
                    </tr>
                    <tr>
                      <th scope="row">Default</th>
                      <td>Column content</td>
                      <td>Column content</td>
                      <td>Column content</td>
                    </tr>
                    <tr class="table-primary">
                      <th scope="row">Primary</th>
                      <td>Column content</td>
                      <td>Column content</td>
                      <td>Column content</td>
                    </tr>
                    <tr class="table-secondary">
                      <th scope="row">Secondary</th>
                      <td>Column content</td>
                      <td>Column content</td>
                      <td>Column content</td>
                    </tr>
                    <tr class="table-success">
                      <th scope="row">Success</th>
                      <td>Column content</td>
                      <td>Column content</td>
                      <td>Column content</td>
                    </tr>
                    <tr class="table-danger">
                      <th scope="row">Danger</th>
                      <td>Column content</td>
                      <td>Column content</td>
                      <td>Column content</td>
                    </tr>
                    <tr class="table-warning">
                      <th scope="row">Warning</th>
                      <td>Column content</td>
                      <td>Column content</td>
                      <td>Column content</td>
                    </tr>
                    <tr class="table-info">
                      <th scope="row">Info</th>
                      <td>Column content</td>
                      <td>Column content</td>
                      <td>Column content</td>
                    </tr>
                    <tr class="table-light">
                      <th scope="row">Light</th>
                      <td>Column content</td>
                      <td>Column content</td>
                      <td>Column content</td>
                    </tr>
                    <tr class="table-dark">
                      <th scope="row">Dark</th>
                      <td>Column content</td>
                      <td>Column content</td>
                      <td>Column content</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /example -->

            </div>
          </div>
        </div>
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
                      <div class="col-sm-10"><input id="staticEmail" class="form-control-plaintext" readonly="readonly"
                          type="text" value="email@example.com" /></div>
                    </div>
                    <div class="form-group"><label for="exampleInputEmail1">Email address</label>
                      <input id="exampleInputEmail1" class="form-control" type="email" placeholder="Enter email"
                        aria-describedby="emailHelp" />
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small></div>
                    <div class="form-group"><label for="exampleInputPassword1">Password</label>
                      <input id="exampleInputPassword1" class="form-control" type="password" placeholder="Password" /></div>
                    <div class="form-group"><label for="exampleSelect1">Example select</label>
                      <select id="exampleSelect1" class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select></div>
                    <div class="form-group"><label for="exampleSelect2">Example multiple select</label>
                      <select id="exampleSelect2" class="form-control" multiple="multiple">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select></div>
                    <div class="form-group"><label for="exampleTextarea">Example textarea</label>
                      <textarea id="exampleTextarea" class="form-control" rows="3"></textarea></div>
                    <div class="form-group"><label for="exampleInputFile">File input</label>
                      <input id="exampleInputFile" class="form-control-file" type="file" aria-describedby="fileHelp" />
                      <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for
                        the above input. It's a bit lighter and easily wraps to a new line.</small></div>
                    <fieldset class="form-group">
                      <legend>Radio buttons</legend>
                      <div class="form-check"><label class="form-check-label">
                          <input id="optionsRadios1" class="form-check-input" checked="checked" name="optionsRadios"
                            type="radio" value="option1" />
                          Option one is this and that—be sure to include why it's great
                        </label></div>
                      <div class="form-check"><label class="form-check-label">
                          <input id="optionsRadios2" class="form-check-input" name="optionsRadios" type="radio"
                            value="option2" />
                          Option two can be something else and selecting it will deselect option one
                        </label></div>
                      <div class="form-check disabled"><label class="form-check-label">
                          <input id="optionsRadios3" class="form-check-input" disabled="disabled" name="optionsRadios"
                            type="radio" value="option3" />
                          Option three is disabled
                        </label></div>
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
                <div class="form-group"><label class="col-form-label col-form-label-lg" for="inputLarge">Large input</label>
                  <input id="inputLarge" class="form-control form-control-lg" type="text" placeholder=".form-control-lg" />
                </div>
                <div class="form-group"><label class="col-form-label" for="inputDefault">Default input</label>
                  <input id="inputDefault" class="form-control" type="text" placeholder="Default input" /></div>
                <div class="form-group"><label class="col-form-label col-form-label-sm" for="inputSmall">Small input</label>
                  <input id="inputSmall" class="form-control form-control-sm" type="text" placeholder=".form-control-sm" />
                </div>
                <div class="form-group">

                  <label class="control-label">Input addons</label>
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                      <input class="form-control" type="text" aria-label="Amount (to the nearest dollar)" />
                      <div class="input-group-append"><span class="input-group-text">.00</span></div>
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
                      <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label></div>
                    <div class="custom-control custom-switch"><input id="customSwitch2" class="custom-control-input"
                        disabled="disabled" type="checkbox" />
                      <label class="custom-control-label" for="customSwitch2">Disabled switch element</label></div>
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
                </fieldset>
              </div>
            </div>
          </div>
        </div>
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
          <div>
            <h2>Badges</h2>
            <div class="bs-component" style="margin-bottom: 40px;"><span class="badge badge-primary">Primary</span>
              <span class="badge badge-secondary">Secondary</span>
              <span class="badge badge-success">Success</span>
              <span class="badge badge-danger">Danger</span>
              <span class="badge badge-warning">Warning</span>
              <span class="badge badge-info">Info</span>
              <span class="badge badge-light">Light</span>
              <span class="badge badge-dark">Dark</span></div>
            <div class="bs-component"><span class="badge badge-pill badge-primary">Primary</span>
              <span class="badge badge-pill badge-secondary">Secondary</span>
              <span class="badge badge-pill badge-success">Success</span>
              <span class="badge badge-pill badge-danger">Danger</span>
              <span class="badge badge-pill badge-warning">Warning</span>
              <span class="badge badge-pill badge-info">Info</span>
              <span class="badge badge-pill badge-light">Light</span>
              <span class="badge badge-pill badge-dark">Dark</span></div>
          </div>
        </div>
        <!-- Progress ================================================== -->
        <div class="bs-docs-section">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">
                <h2 id="progress">Progress</h2>
              </div>
              <h3 id="progress-basic">Basic</h3>
              <div class="bs-component">
                <div class="progress">
                  <div class="progress-bar" style="width: 25%;" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
              </div>
              <h3 id="progress-alternatives">Contextual alternatives</h3>
              <div class="bs-component">
                <div class="progress">
                  <div class="progress-bar bg-success" style="width: 25%;" role="progressbar" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress">
                  <div class="progress-bar bg-info" style="width: 50%;" role="progressbar" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress">
                  <div class="progress-bar bg-warning" style="width: 75%;" role="progressbar" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress">
                  <div class="progress-bar bg-danger" style="width: 100%;" role="progressbar" aria-valuenow="100"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <h3 id="progress-multiple">Multiple bars</h3>
              <div class="bs-component">
                <div class="progress">
                  <div class="progress-bar" style="width: 15%;" role="progressbar" aria-valuenow="15" aria-valuemin="0"
                    aria-valuemax="100"></div>
                  <div class="progress-bar bg-success" style="width: 30%;" role="progressbar" aria-valuenow="30"
                    aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-info" style="width: 20%;" role="progressbar" aria-valuenow="20"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <h3 id="progress-striped">Striped</h3>
              <div class="bs-component">
                <div class="progress">
                  <div class="progress-bar progress-bar-striped" style="width: 10%;" role="progressbar" aria-valuenow="10"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped bg-success" style="width: 25%;" role="progressbar"
                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped bg-info" style="width: 50%;" role="progressbar"
                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped bg-warning" style="width: 75%;" role="progressbar"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped bg-danger" style="width: 100%;" role="progressbar"
                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <h3 id="progress-animated">Animated</h3>
              <div class="bs-component">
                <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 75%;" role="progressbar"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Containers ================================================== -->
        <div class="bs-docs-section">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">
                <h2 id="containers">Containers</h2>
              </div>
              <div class="bs-component">
                <div class="jumbotron">
                  <h1 class="display-3">Hello, world!</h1>
                  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                    to featured content or information.</p>


                  <hr class="my-4" />

                  It uses utility classes for typography and spacing to space content out within the larger container.
                  <p class="lead"><a class="btn btn-primary btn-lg" role="button" href="#">Learn more</a></p>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <h2>List groups</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="bs-component">
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-center">Cras justo odio
                    <span class="badge badge-primary badge-pill">14</span></li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Dapibus ac facilisis in
                    <span class="badge badge-primary badge-pill">2</span></li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Morbi leo risus
                    <span class="badge badge-primary badge-pill">1</span></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="bs-component">
                <div class="list-group"><a class="list-group-item list-group-item-action active" href="#">
                    Cras justo odio
                  </a>
                  <a class="list-group-item list-group-item-action" href="#">Dapibus ac facilisis in
                  </a>
                  <a class="list-group-item list-group-item-action disabled" href="#">Morbi leo risus
                  </a></div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="bs-component">
                <div class="list-group">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">List group item heading</h5>
                    <small>3 days ago</small>

                  </div>
                  <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius
                    blandit.</p>
                  <small>Donec id elit non mi porta.</small>
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">List group item heading</h5>
                    <small class="text-muted">3 days ago</small>

                  </div>
                  <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius
                    blandit.</p>
                  <small class="text-muted">Donec id elit non mi porta.</small>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <h2>Cards</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="bs-component">
                <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Primary card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Secondary card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Success card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Danger card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Warning card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Info card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card bg-light mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Light card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Dark card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="bs-component">
                <div class="card border-primary mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Primary card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card border-secondary mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Secondary card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card border-success mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Success card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card border-danger mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Danger card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card border-warning mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Warning card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card border-info mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Info card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card border-light mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Light card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
                <div class="card border-dark mb-3" style="max-width: 20rem;">
                  <div class="card-header">Header</div>
                  <div class="card-body">
                    <h4 class="card-title">Dark card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="bs-component">
                <div class="card mb-3">
                  <h3 class="card-header">Card header</h3>
                  <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                  </div>
                  <img style="height: 200px; width: 100%; display: block;" height="180" />

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    @include('partials.content-page')
  @endwhile
@endsection
