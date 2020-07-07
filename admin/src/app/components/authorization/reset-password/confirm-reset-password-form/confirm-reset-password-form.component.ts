import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from "@angular/forms";
import {AuthorizationApiService} from "@app/api/authorization";
import {ActivatedRoute} from "@angular/router";
import {MustMatch} from "@app/_shared/validation";

@Component({
  selector: 'app-confirm-reset-password-form',
  templateUrl: './confirm-reset-password-form.component.html',
  styleUrls: ['./confirm-reset-password-form.component.css']
})
export class ConfirmResetPasswordFormComponent implements OnInit {

  public confirmResetForm: FormGroup;
  public submitted = false;
  hide = true;

  public password: string;
  public confirmPassword: string;

  public apiError: any;

  constructor(
    private fb: FormBuilder,
    private api: AuthorizationApiService,
    private activeRoute: ActivatedRoute
  ) {
    this._createForm();
  }

  ngOnInit(): void {
  }

  private _createForm() {
    this.confirmResetForm = this.fb.group({
      password: ["", [
        Validators.required,
        Validators.minLength(8),
        Validators.maxLength(16),
        Validators.pattern("[0-9a-zA-Z]+")
      ]],
      confirmPassword: ["", [Validators.required]],
    }, {
      validator: MustMatch("password", "confirmPassword")
    });
  }

  get _password() {
    return this.confirmResetForm.get("password");
  }

  get _confirmPassword() {
    return this.confirmResetForm.get("confirmPassword");
  }

  onSubmit() {
    this.submitted = true;
    if (this.confirmResetForm.invalid) {
      return;
    }

    const {password} = this.confirmResetForm.value;

    this.apiError = null;

    this.api.completeResetPassword(this.activeRoute.snapshot.url[3].path, password).subscribe(
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
