import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ContentCategoryTableComponent } from './news-table.component';

describe('NewsTableComponent', () => {
  let component: ContentCategoryTableComponent;
  let fixture: ComponentFixture<ContentCategoryTableComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ContentCategoryTableComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ContentCategoryTableComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
