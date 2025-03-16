<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Sign Up</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="row m-2 p-2">
                                <div class="col-md-4 p-2">
                                    <label>First Name</label>
                                    <input id="firstName" placeholder="First Name" class="form-control" type="text"/>
                                </div>
                                <div class="col-md-4 p-2">
                                    <label>Last Name</label>
                                    <input id="lastName" placeholder="Last Name" class="form-control" type="text"/>
                                </div>
                            </div>
                            <div class="row m-2 p-2">
                                <div class="col-md-4 p-2">
                                    <label>Email Address</label>
                                    <input id="email" placeholder="User Email" class="form-control" type="email"/>
                                </div>
                                <div class="col-md-4 p-2">
                                    <label>Password</label>
                                    <input id="password" placeholder="User Password" class="form-control" type="password"/>
                                </div>
                            </div>
                            <div class="row m-2 p-2">
                                <div class="col-md-4 p-2">
                                    <label>Mobile Number</label>
                                    <input id="mobile" placeholder="Mobile" class="form-control" type="tel"/>
                                </div>
                                <div class="col-md-4 p-2">
                                    <label>Address</label>
                                    <input id="address" placeholder="Your Address" class="form-control" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="row m-2 p-2">
                            <div class="col-md-4 p-2">
                                <button onclick="onRegistration()" class="btn mt-3 w-100  bg-gradient-primary">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function onRegistration(){
        let firstName = document.getElementById('firstName').value;
        let lastName = document.getElementById('lastName').value;
        let email = document.getElementById('email').value;
        let mobile = document.getElementById('mobile').value;
        let address = document.getElementById('address').value;
        let password = document.getElementById('password').value;

        if (email.length === 0){
            errorToast('Email is required')
        }
        else if(firstName.length===0){
            errorToast('First Name is required')
        }
        else if(lastName.length===0){
            errorToast('Last Name is required')
        }
        else if(mobile.length===0){
            errorToast('Mobile is required')
        }
        else if(password.length===0){
            errorToast('Password is required')
        }
        else{
            showLoader();
            let res = await axios.post("/user-registration",{
                firstName:firstName,
                lastName:lastName,
                email:email,
                mobile:mobile,
                address:address,
                password:password
            });
            hideLoader();
            //console.log(res);
            if(res.status === 201 && res.data['status'] === 'success'){
                successToast(res.data['message']);
                //console.log('Redirecting to user login...');
                setTimeout(() => {
                    window.location.replace('/userLogin');
                },1000)
            }
            else {
                errorToast(res.data['message']);
            }
        }
    }
</script>
