import { Component, OnInit } from '@angular/core';
import { Keyword, KeywordDispatcher, KeywordSelectors } from "@app/context";

@Component({
  selector: 'app-keyword',
  templateUrl: './keyword.component.html',
  styleUrls: ['./keyword.component.css']
})
export class KeywordComponent implements OnInit {

    keywords: Keyword[];

    constructor(private selector: KeywordSelectors,
                private dispatcher: KeywordDispatcher) {
    }

    ngOnInit(): void {
        this.dispatcher.load();
        this.selector.list().subscribe(data => this.keywords = [...data]);

    }

}
