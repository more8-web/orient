import { Component, OnInit } from '@angular/core';
import {FormGroup, FormBuilder, Validators} from "@angular/forms";
import { AuthorizationApiService} from "@app/api/authorization";

@Component({
  selector: 'app-login-form',
  templateUrl: './login-form.component.html',
  styleUrls: ['./login-form.component.css']
})
export class LoginFormComponent implements OnInit {

  loginForm: FormGroup;
  public submitted = false;

  email: string; // login
  password: string;

  public apiError: any;

  constructor(private fb: FormBuilder,
              private api: AuthorizationApiService) {
    this._createForm();
  }

  ngOnInit(): void {
  }

  get _email() {
    return this.loginForm.get("email");
  }

  get _password() {
    return this.loginForm.get("password");
  }



  onSubmit() {
    this.submitted = true;
    if (this.loginForm.invalid) {
      return;
    }

    const {email, password} = this.loginForm.value;

    this.apiError = null;

    this.api.login(email, password).subscribe(
      (data) => console.log(data),
      (err) => {
        if (err?.error?.details?.password) {
          this.apiError = {
            password: err.error.details.password
          };
        }
      }
    );
  }

  private _createForm() {
    this.loginForm = this.fb.group({
      email: ["", [Validators.required]],
      password: ["", [Validators.required]]
    });
  }

}
