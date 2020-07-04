import {Component, OnInit} from "@angular/core";
import {FormGroup, FormBuilder, Validators} from "@angular/forms";

import {AuthorizationApiService} from "@app/api/authorization";

import {MustMatch} from "@app/_shared/validation";

@Component({
  selector: "app-registration-form",
  templateUrl: "./registration-form.component.html",
  styleUrls: ["./registration-form.component.css"]
})
export class RegistrationFormComponent implements OnInit {

  public registerForm: FormGroup;
  public submitted = false;
  hide = true;

  public mail: string;
  public password: string;
  public confirmPassword: string;

  public apiError: any;

  constructor(
    private fb: FormBuilder,
    private api: AuthorizationApiService
  ) {
    this._createForm();
  }

  ngOnInit(): void {
  }

  private _createForm() {
    this.registerForm = this.fb.group({
      mail: ["", [Validators.required, Validators.email]],
      password: ["", [
        Validators.required,
        Validators.minLength(6),
        Validators.pattern("[0-9a-zA-Z]+")
      ]],
      confirmPassword: ["", [Validators.required]],
    }, {
      validator: MustMatch("password", "confirmPassword")
    });
  }

  get _mail() {
    return this.registerForm.get("mail");
  }

  get _password() {
    return this.registerForm.get("password");
  }

  get _confirmPassword() {
    return this.registerForm.get("confirmPassword");
  }

  onSubmit() {
    this.submitted = true;
    if (this.registerForm.invalid) {
      return;
    }

    const {mail, password} = this.registerForm.value;

    this.apiError = null;

    this.api.register(mail, password).subscribe(
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

}
