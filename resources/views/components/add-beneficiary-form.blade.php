<div class="modal fade" id="addBeneficiary" tabindex="-1" role="dialog" aria-labelledby="addBeneficiaryLabel" aria-hidden="true">
    <div
    class="modal-dialog"
    style="
        border: 5px solid #74f76d;
        border-radius: 8px;
        "
    role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h6 class="m-0 font-weight-bold text-primary">TUPAD Program - Add Beneficiaries</h6>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">
                <form action="{{ route('admin.tupad.add.beneficiary') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Row 1 -->
                    <div class="row mb-3">

                        <div class="col-lg-12 mb-1">

                            <label for="">Project Reference Number</label>
                            <input name="project_reference" type="text" value="{{ old('project_reference') }}" class="form-control" id="" placeholder="Enter Project Reference Number">

                            @error('project_reference')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>
                    <!-- End -->

                    <!-- Row 2 -->
                    <div class="row mb-3">

                        <div class="col-lg-6 mb-1">

                            <label for="">Contact Number</label>
                            <input name="contact_number" type="text" value="{{ old('contact_number') }}" class="form-control" id="" placeholder="Enter Contact Number">

                            @error('contact_number')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-lg-6 mb-1">

                            <label for="">Email Address</label>
                            <input name="email_address" type="text" value="{{ old('email_address') }}" class="form-control" id="" placeholder="Enter Email Address">

                            @error('email_address')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>
                    <!-- End -->

                    <!-- Row 3 -->
                    <div class="row mb-3">

                        <div class="col-lg-6 mb-1">

                            <label for="">First Name</label>
                            <input name="first_name" type="text" value="{{ old('first_name') }}" class="form-control" id="" placeholder="Enter First Name">

                            @error('first_name')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-lg-6 mb-1">

                            <label for="">Middle Initial</label>
                            <input name="middle_initial" type="text" value="{{ old('middle_initial') }}" class="form-control" id="" placeholder="Enter Middle Initial">

                            @error('middle_initial')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>
                    <!-- End -->

                    <!-- Row 4 -->
                    <div class="row mb-3">

                        <div class="col-lg-6 mb-1">

                            <label for="">Last Name</label>
                            <input name="last_name" type="text" value="{{ old('last_name') }}" class="form-control" id="" placeholder="Enter Last Name">

                            @error('last_name')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-lg-6 mb-1">

                            <label for="">Name Extension</label>
                            <input name="name_extension" type="text" value="{{ old('name_extension') }}" class="form-control" id="" placeholder="Extension (Jr., Sr., etc.)">

                            @error('name_extension')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>
                    <!-- End -->

                    <!-- Row 4 -->
                    <div class="row mb-3">

                        <div class="col-lg-6 mb-1">
                            <label for="">Date of Birth</label>
                            <input name="date_of_birth" type="date" value="{{ old('date_of_birth') }}" class="form-control" id="" placeholder="Enter Date of Birth">

                            @error('date_of_birth')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-lg-6 mb-1">
                            <label for="">Age</label>
                            <input name="age" type="text" value="{{ old('age') }}" class="form-control" id="" placeholder="Enter Your Age">

                            @error('age')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- End -->

                    <!-- Row 5 -->
                    <div class="row mb-3">

                        <div class="col-lg-12 mb-1">

                            <label for="">Region</label>
                            <input name="region" type="text" value="REGION 10 ONLY" class="form-control" readonly>

                        </div>

                    </div>
                    <!-- End -->

                    <!-- Row 6 -->
                    <div class="row mb-3">

                        <div class="col-lg-12 mb-1">

                            <label for="">Province</label>
                            <select name="province" class="form-control" id="">
                                <option value="" selected>Select Province</option>
                                <option value="Cagayan de Oro City">Cagayan de Oro City</option>
                                <option value="Misamis Oriental">Misamis Oriental</option>
                                <option value="Misamis Occidental">Misamis Occidental</option>
                                <option value="Lanao Del Norte">Lanao Del Norte</option>
                                <option value="Bukidnon">Bukidnon</option>
                                <option value="Camiguin">Camiguin</option>
                            </select>

                            @error('province')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- <div class="col-lg-6 mb-1">

                            <label for="">Complete Address</label>
                            <input name="complete_address" type="text" value="{{ old('complete_address') }}" class="form-control" id="" placeholder="Enter Complete Address">

                            @error('complete_address')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div> --}}

                    </div>
                    <!-- End -->

                    <!-- Row 6 -->
                    <div class="row mb-3">

                        <div class="col-lg-4 mb-1">

                            <label for="">Barangay</label>
                            <input name="barangay" type="text" value="{{ old('barangay') }}" class="form-control" id="" placeholder="Enter barangay ">


                            @error('barangay')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-lg-4 mb-1">

                            <label for="">Street No.</label>
                            <input name="street" type="text" value="{{ old('street') }}" class="form-control" id="" placeholder="Enter Street">

                            @error('street')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-lg-4 mb-1">

                            <label for="">Postal Code.</label>
                            <input name="postal_code" type="text" value="{{ old('postal_code') }}" class="form-control" id="" placeholder="Enter Street">

                            @error('postal_code')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>
                    <!-- End -->

                    <!-- Row 7 -->
                    <div class="row mb-3">

                        <div class="col-lg-6 mb-1">

                            <label for="">Designated Beneficiary</label>
                            <input name="designated_beneficiary" type="text" value="{{ old('designated_beneficiary') }}" class="form-control" id="" placeholder="Enter Designated Beneficiary">

                            @error('designated_beneficiary')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-lg-6 mb-1">

                            <label for="">Relationship To Assured</label>
                            <input name="relationship_to_assured" type="text" value="{{ old('relationship_to_assured') }}" class="form-control" id="" placeholder="Enter Relationship To Assured">

                            @error('relationship_to_assured')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>
                    <!-- End -->

                    <!-- Row 8 -->
                    <div class="row mb-3">

                        <div class="col-lg-6 mb-1">

                            <label for="">Period of Employment Start Date</label>
                            <input name="period_of_employment_start" type="date" value="{{ old('period_of_employment_start') }}" class="form-control" id="" placeholder="Enter Period of Employment">

                            @error('period_of_employment_start')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-lg-6 mb-1">

                            <label for="">Period of Employment End Date</label>
                            <input name="period_of_employment_end" type="date" value="{{ old('period_of_employment_end') }}" class="form-control" id="" placeholder="Enter Period of Employment">

                            @error('period_of_employment_end')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>
                    <!-- End -->

                    <!-- Row 9 -->
                    <div class="row mb-3">

                        <div class="col-lg-12 mb-1">

                            <label for="">Beneficiary Type</label>
                            <input name="beneficiary_type" type="text" value="{{ old('beneficiary_type') }}" class="form-control" id="" placeholder="Enter Beneficiary Type">

                            @error('beneficiary_type')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>
                    <!-- End -->

                    <!-- Row 10 -->
                    <div class="row mb-3">

                        <div class="col-lg-12 mb-1">

                            <label for="">Insurance Total Amount</label>
                            <input name="total_insurance_amount" type="text" value="{{ old('total_insurance_amount') }}" class="form-control" id="" placeholder="Enter Amount">

                            @error('total_insurance_amount')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>
                    <!-- End -->

                    <!-- Row 11 -->
                    <div class="row mb-3">

                        <div class="col-lg-12 mb-1">

                            <label for="">Status</label>
                            <textarea name="status" class="form-control" id="" placeholder="Enter Status" rows="5">{{ old('status') }}</textarea>

                            @error('status')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>
                    <!-- End -->

                    <!-- Row 12 -->
                    <div class="row mb-3">

                        <div class="col-lg-12 mb-1">

                            <label for="">Remarks</label>
                            <textarea name="remarks" class="form-control" id="" placeholder="Enter Remarks" rows="5">{{ old('remarks') }}</textarea>

                            @error('remarks')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- End -->

                    <!-- Row 13 -->
                    <div class="row mb-3">

                        <label for="">Upload Valid ID</label>

                        <div class="col-lg-12 mb-1 text-center">
                            <input type="file" name="picture" accept="jpeg" class="form-control">
                        </div>

                        @error('picture')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror

                    </div>
                    <!-- End -->

                    <!-- Row 14 -->
                    <div class="row mb-3">

                        <div class="col-lg-12 mb-1 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Add Beneficiary</button>
                        </div>

                    </div>
                    <!-- End -->
                </form>
            </div>
        </div>
    </div>
</div>
