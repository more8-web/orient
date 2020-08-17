import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NewsCategoryTableComponent } from './news-table.component';

describe('NewsTableComponent', () => {
  let component: NewsCategoryTableComponent;
  let fixture: ComponentFixture<NewsCategoryTableComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NewsCategoryTableComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NewsCategoryTableComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
