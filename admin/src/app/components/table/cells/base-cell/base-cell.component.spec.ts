import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { HeaderCellComponent } from './table-header-cell.component';

describe('TableHeaderCellComponent', () => {
  let component: HeaderCellComponent;
  let fixture: ComponentFixture<HeaderCellComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ HeaderCellComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HeaderCellComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
