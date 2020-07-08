import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from "@angular/forms";
import {AuthorizationApiService} from "@app/api/authorization";

@Component({
  selector: 'app-reset-password-form',
  templateUrl: './reset-password-form.component.html',
  styleUrls: ['./reset-password-form.component.css']
})
export class ResetPasswordFormComponent implements OnInit {

  public resetPasswordForm: FormGroup;

  public success = false;
  public submitted = false;

  public apiError: any;

  public email: string;

  constructor(private fb: FormBuilder,
              private api: AuthorizationApiService) {
    this._createForm();
  }

  ngOnInit(): void {
  }

  onSubmit() {
    this.submitted = true;
    if (this.resetPasswordForm.invalid) {
      return;
    }

    const {email} = this.resetPasswordForm.value;

    this.apiError = null;

    this.api.resetPassword(email).subscribe(
      (data) => {
        console.log(data);
        this.success = true;
      },
      (err) => {
        if (err?.error?.details?.email) {
          this.apiError = {
            email: err.error.details.email
          };
        }
      }
    );
  }

  private _createForm() {
    this.resetPasswordForm = this.fb.group({
      email: ["", [Validators.required]],
    });
  }

}
