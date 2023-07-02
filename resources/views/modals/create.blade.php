<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Modal Title</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          {{-- Modal Input Group --}}
              <form>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Full Name</label>
                  <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Company</label>
                  <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc.">
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-email">Email</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2">
                    <span class="input-group-text" id="basic-default-email2">@example.com</span>
                  </div>
                  <div class="form-text"> You can use letters, numbers &amp; periods </div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-phone">Phone No</label>
                  <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941">
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-message">Message</label>
                  <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
          {{-- End Input Group --}}
        </div>                
      </div>
    </div>
  </div>