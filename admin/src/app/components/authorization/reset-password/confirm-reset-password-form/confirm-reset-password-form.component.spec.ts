import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ConfirmResetPasswordFormComponent } from './confirm-reset-password-form.component';

describe('ConfirmResetPasswordFormComponent', () => {
  let component: ConfirmResetPasswordFormComponent;
  let fixture: ComponentFixture<ConfirmResetPasswordFormComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ConfirmResetPasswordFormComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConfirmResetPasswordFormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
