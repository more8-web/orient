import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ContentTableComponent } from './news-table.component';

describe('NewsTableComponent', () => {
  let component: ContentTableComponent;
  let fixture: ComponentFixture<ContentTableComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ContentTableComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ContentTableComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
