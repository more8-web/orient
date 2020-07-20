import { Component, OnInit } from '@angular/core';
import {FormGroup, FormBuilder, Validators} from "@angular/forms";
import { AuthorizationApiService} from "@app/api/authorization";
import {Router} from "@angular/router";

@Component({
  selector: 'app-login-form',
  templateUrl: './login-form.component.html',
  styleUrls: ['./login-form.component.css']
})
export class LoginFormComponent implements OnInit {

  loginForm: FormGroup;

  public submitted = false;
  hide = true;

  checked = false; // false = SessionStorage; true = localStorage;
  email: string; // login
  password: string;



  public apiError: any;

  constructor(private fb: FormBuilder,
              private api: AuthorizationApiService,
              private router: Router) {
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
      (data: any) => {
        if (this.checked === false) {
          sessionStorage.setItem("X-AUTH-TOKEN", data.token);
          this.router.navigateByUrl("dashboard");
        } else {
          localStorage.setItem('X-AUTH-TOKEN', data.token);
          this.router.navigateByUrl("dashboard");
        }
      },
      (err) => {
        if (err?.error?.message) {
          console.log(err?.error?.message);
          this.apiError = {
            error: err.error.message
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
