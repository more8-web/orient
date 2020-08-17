import { Component, HostBinding, Input, OnInit } from "@angular/core";

@Component({
  selector: 'app-table-cell',
  templateUrl: './base-cell.component.html',
  styleUrls: ['./base-cell.component.css']
})
export class BaseCellComponent implements OnInit {

    @Input() value: any;
    @Input() @HostBinding('class') classes;

    constructor() {
    }

    ngOnInit(): void {
    }

}
