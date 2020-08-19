import {Component, EventEmitter, HostBinding, Input, OnInit, Output} from "@angular/core";

@Component({
    selector: "app-input",
    templateUrl: "./input.component.html",
    styleUrls: ["./input.component.css"]
})
export class InputComponent implements OnInit {

    @Input() label: any;
    @Input() value: any;
    @Input() formName: any;

    @Input() @HostBinding("class") classes;
    @HostBinding("class") localClasses = ["form-group"];

    @Output() formValue = new EventEmitter();

    constructor() {
    }

    ngOnInit(): void {
    }

    toForm(value) {
        this.formValue.emit(value);
    }
}
