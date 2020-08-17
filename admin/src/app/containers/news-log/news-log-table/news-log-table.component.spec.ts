import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NewsLogTableComponent } from './news-table.component';

describe('NewsTableComponent', () => {
  let component: NewsLogTableComponent;
  let fixture: ComponentFixture<NewsLogTableComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NewsLogTableComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NewsLogTableComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
