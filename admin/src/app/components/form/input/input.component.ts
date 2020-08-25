import {
    Component,
    ElementRef,
    EventEmitter,
    HostBinding,
    Input,
    OnInit,
    Output,
    ViewChild,
    Self, AfterViewInit
} from "@angular/core";
import {ControlValueAccessor, FormControl, NgControl} from "@angular/forms";

@Component({
    selector: "app-input",
    templateUrl: "./input.component.html",
    styleUrls: ["./input.component.css"]
})
export class InputComponent implements OnInit, ControlValueAccessor, AfterViewInit {

    @ViewChild("input", {static: true}) input: ElementRef;

    disabled;

    @Input() label: any;
    @Input() inputValue: any;

    @Input() @HostBinding("class") classes;
    @HostBinding("class") localClasses = ["form-group"];

    @Output() formValue = new EventEmitter();

    constructor(@Self() public ngControl: NgControl) {
        this.ngControl.valueAccessor = this;
    }

    ngOnInit(): void {
    }

    ngAfterViewInit(): void {
    }

    writeValue(obj: any) {
        this.input.nativeElement.value = obj;
    }

    registerOnChange(fn) {
        this.onChange = fn;
    }

    registerOnTouched(fn: any): void {
        this.onTouched = fn;
    }

    setDisabledState?(isDisabled: boolean): void {
        this.disabled = isDisabled;
    }

    onChange(event) { }

    onTouched() { }
}
