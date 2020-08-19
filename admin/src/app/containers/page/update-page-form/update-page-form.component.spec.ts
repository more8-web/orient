import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { UpdatePageFormComponent } from './update-page-form.component';

describe('PageFormComponent', () => {
  let component: UpdatePageFormComponent;
  let fixture: ComponentFixture<UpdatePageFormComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UpdatePageFormComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UpdatePageFormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
