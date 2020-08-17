import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PageTableComponent } from './news-table.component';

describe('NewsTableComponent', () => {
  let component: PageTableComponent;
  let fixture: ComponentFixture<PageTableComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PageTableComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PageTableComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
