import { Component, HostBinding, HostListener, Input, OnInit } from "@angular/core";
import { FormService } from "@app/services/form.service";

@Component({
    selector: "app-input",
    templateUrl: "./input.component.html",
    styleUrls: ["./input.component.css"]
})
export class InputComponent implements OnInit {

    @Input() label: any;
    @Input() value: any;

    @Input() @HostBinding("class") classes;
    @HostBinding("class") localClasses = ["form-group"];

    @HostListener("change", ["$event.target.value"])
    onClick(inputValue) {
        this.formService.onClick(this.label, inputValue);
    }


    constructor(private formService: FormService) {
    }

    ngOnInit(): void {
    }

}
